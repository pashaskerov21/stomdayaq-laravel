<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use App\Models\WorkerCategory;
use App\Models\WorkerTranslate;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = Worker::where('destroy',0)->orderBy('sort')->get();
        return view('admin-panel.worker.workers.index',compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = WorkerCategory::where('destroy',0)->orderBy('sort')->get();
        return view('admin-panel.worker.workers.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg',
            'name.*' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $worker_img = time() . $file->getClientOriginalName();
            $file->move('uploads/worker', $worker_img);
        }
        $worker_id = Worker::create([
            'category_id' => $request->category,
            'image' => $worker_img,
            'image_old' => $worker_img,
        ])->id;
        for($i = 0; $i < count($request->lang); $i++){
            WorkerTranslate::create([
                'worker_id' => $worker_id,
                'name' => $request['name'][$i],
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.worker.index')->with('success', 'Uğurla əlavə edildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $worker = Worker::findOrFail($id);
        $categories = WorkerCategory::where('destroy',0)->orderBy('sort')->get();
        return view('admin-panel.worker.workers.edit',compact(['worker','categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'category' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,svg',
            'name.*' => 'required',
        ]);
        $worker = Worker::findOrFail($id);
        $worker->category_id = $request->category;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $worker_img = time() . $file->getClientOriginalName();
            $file->move('uploads/worker', $worker_img);

            $worker->image = $worker_img;
        }else{
            $worker->image = $worker->image_old;
        }
        $worker->save();
        for($i = 0; $i < count($request->lang); $i++){
            WorkerTranslate::where(['worker_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'name' => $request['name'][$i],
                'lang' => $request['lang'][$i],
            ]);
        }
        return redirect()->route('admin.worker.index')->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
        
    }

    public function sort(Request $request){
       
        $sorts = $request->sort;
        foreach($sorts as $key=>$sort){
            Worker::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $worker = Worker::findOrFail($id);
        $worker->destroy = 1;
        $worker->save();
        return redirect()->route('admin.worker.index')->with('success','Uğurla silindi');
    }
}
