<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\WorkerCategory;
use App\Models\WorkerCategoryTranslate;
use Illuminate\Http\Request;

class WorkerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = WorkerCategory::where('destroy',0)->orderBy('sort')->get();
        return view('admin-panel.worker.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.worker.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name.*' => 'required',
        ]);
        $category_id = WorkerCategory::create()->id;
        for($i = 0; $i < count($request->lang); $i++){
            WorkerCategoryTranslate::create([
                'category_id' => $category_id,
                'name' => $request['name'][$i],
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.worker-categories.index')->with('success', 'Uğurla əlavə edildi');
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
        $category = WorkerCategory::findOrFail($id);
        return view('admin-panel.worker.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name.*' => 'required',
        ]);
        $category = WorkerCategory::findOrFail($id);
        $category->save();
        for($i = 0; $i < count($request->lang); $i++){
            WorkerCategoryTranslate::where(['category_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'name' => $request['name'][$i],
                'lang' => $request['lang'][$i],
            ]);
        }
        return redirect()->route('admin.worker-categories.index')->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }


    public function sort(Request $request){
       
        $sorts = $request->sort;
        foreach($sorts as $key=>$sort){
            WorkerCategory::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = WorkerCategory::findOrFail($id);
        $category->destroy = 1;
        $category->save();
        return redirect()->route('admin.worker-categories.index')->with('success','Uğurla silindi');
    }
}
