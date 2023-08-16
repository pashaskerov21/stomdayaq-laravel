<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\ApplicationArea;
use App\Models\ApplicationAreaTranslate;
use Illuminate\Http\Request;

class ApplicationAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = ApplicationArea::where('destroy',0)->orderBy('sort')->get();
        return view('admin-panel.application-area.index',compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.application-area.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name.*' => 'required',
        ]);
        $area_id = ApplicationArea::create()->id;
        for($i = 0; $i < count($request->lang); $i++){
            ApplicationAreaTranslate::create([
                'area_id' => $area_id,
                'name' => $request['name'][$i],
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.application-area.index')->with('success', 'Uğurla əlavə edildi');
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
        $area = ApplicationArea::findOrFail($id);
        return view('admin-panel.application-area.edit',compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name.*' => 'required',
        ]);
        $area = ApplicationArea::findOrFail($id);
        $area->save();
        for($i = 0; $i < count($request->lang); $i++){
            ApplicationAreaTranslate::where(['area_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'name' => $request['name'][$i],
                'lang' => $request['lang'][$i],
            ]);
        }
        return redirect()->route('admin.application-area.index')->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }

    public function sort(Request $request){
       
        $sorts = $request->sort;
        foreach($sorts as $key=>$sort){
            ApplicationArea::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $area = ApplicationArea::findOrFail($id);
        $area->destroy = 1;
        $area->save();
        return redirect()->route('admin.application-area.index')->with('success','Uğurla silindi');
    }
}
