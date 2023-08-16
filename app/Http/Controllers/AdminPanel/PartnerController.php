<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::where('destroy',0)->orderBy('sort')->get();
        return view('admin-panel.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.partner.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:png,jpg,jpeg,svg',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $partner_img = time() . $file->getClientOriginalName();
            $file->move('uploads/partner', $partner_img);
        }
        Partner::create([
            'image' => $partner_img,
            'image_old' => $partner_img,
            'link' => $request->link,
        ]);
        return redirect()->route('admin.partner.index')->with('success', 'Uğurla əlavə edildi');
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
        $partner = Partner::findOrFail($id);
        return view('admin-panel.partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:png,jpg,jpeg,svg',
        ]);
        $partner = Partner::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $partner_img = time() . $file->getClientOriginalName();
            $file->move('uploads/partner', $partner_img);
            $partner->image = $partner_img;
        }else{
            $partner->image = $partner->image_old;
        }
        $partner->link = $request->link;
        $partner->save();
        return redirect()->route('admin.partner.index')->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }

    public function sort(Request $request){
       
        $sorts = $request->sort;
        foreach($sorts as $key=>$sort){
            Partner::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partner = Partner::findOrFail($id);
        $partner->destroy = 1;
        $partner->save();
        return redirect()->route('admin.partner.index')->with('success','Uğurla silindi');
    }
}
