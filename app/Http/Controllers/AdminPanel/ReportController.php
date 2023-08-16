<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\ReportTranslate;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::where('destroy',0)->orderBy('sort')->get();
        return view('admin-panel.report.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.report.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:png,jpg,jpeg,svg',
            'title.*' => 'required',
            'count_value' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $report_img = time() . $file->getClientOriginalName();
            $file->move('uploads/report', $report_img);
        }
        $report_id = Report::create([
            'count_value' => $request->count_value,
            'image' => $report_img,
            'image_old' => $report_img,
        ])->id;
        for($i = 0; $i < count($request->lang); $i++){
            ReportTranslate::create([
                'report_id' => $report_id,
                'title' => $request['title'][$i],
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.report.index')->with('success', 'Uğurla əlavə edildi');
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
        $report = Report::findOrFail($id);
        return view('admin-panel.report.edit',compact('report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:png,jpg,jpeg,svg',
            'title.*' => 'required',
            'count_value' => 'required',
        ]);
        $report = Report::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $report_img = time() . $file->getClientOriginalName();
            $file->move('uploads/report', $report_img);

            $report->image = $report_img;
        }else{
            $report->image = $report->image_old;
        }
        $report->count_value = $request->count_value;
        $report->save();
        for($i = 0; $i < count($request->lang); $i++){
            ReportTranslate::where(['report_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
                'lang' => $request['lang'][$i],
            ]);
        }
        return redirect()->route('admin.report.index')->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }

    public function sort(Request $request){
       
        $sorts = $request->sort;
        foreach($sorts as $key=>$sort){
            Report::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $report = Report::findOrFail($id);
        $report->destroy = 1;
        $report->save();
        return redirect()->route('admin.report.index')->with('success','Uğurla silindi');
    }
}
