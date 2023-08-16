<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutTranslate;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::where('destroy',0)->orderBy('sort')->get();
        return view('admin-panel.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.about.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'text.*' => 'required',
        ]);
        $about_id = About::create([
            'title' => $request->title,
        ])->id;
        for($i = 0; $i < count($request->lang); $i++){
            AboutTranslate::create([
                'about_id' => $about_id,
                'text' => $request['text'][$i],
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.about.index')->with('success', 'Uğurla əlavə edildi');
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
        $about = About::findOrFail($id);
        return view('admin-panel.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'text.*' => 'required',
        ]);
        $about = About::findOrFail($id);
        $about->title = $request->title;
        $about->save();
        for($i = 0; $i < count($request->lang); $i++){
            AboutTranslate::where(['about_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'text' => $request['text'][$i],
                'lang' => $request['lang'][$i],
            ]);
        }
        return redirect()->route('admin.about.index')->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }

    public function sort(Request $request){
       
        $sorts = $request->sort;
        foreach($sorts as $key=>$sort){
            About::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about = About::findOrFail($id);
        $about->destroy = 1;
        $about->save();
        return redirect()->route('admin.about.index')->with('success','Uğurla silindi');
    }
}
