<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\BannerTextTranslate;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::where('destroy',0)->orderBy('sort')->get();
        return view('admin-panel.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.banner.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:png,jpg,jpeg,svg',
        ]);
        //return $request->content_status;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $banner_img = time() . $file->getClientOriginalName();
            $file->move('uploads/banner', $banner_img);
        }
        $banner_id = Banner::create([
            'image' => $banner_img,
            'image_old' => $banner_img,
            'content_status' => $request->content_status,
        ])->id;
        for($i = 0; $i < count($request->lang); $i++){
            BannerTextTranslate::create([
                'banner_id' => $banner_id,
                'text' => $request['text'][$i],
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.banner.index')->with('success', 'Uğurla əlavə edildi');
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
        $banner = Banner::findOrFail($id);
        return view('admin-panel.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:png,jpg,jpeg,svg',
        ]);
        $banner = Banner::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $banner_img = time() . $file->getClientOriginalName();
            $file->move('uploads/banner', $banner_img);

            $banner->image = $banner_img;
        }else{
            $banner->image = $banner->image_old;
        }
        $banner->content_status = $request->content_status;
        $banner->save();
        for($i = 0; $i < count($request->lang); $i++){
            BannerTextTranslate::where(['banner_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'text' => $request['text'][$i],
                'lang' => $request['lang'][$i],
            ]);
        }
        return redirect()->route('admin.banner.index')->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
        
    }

    public function sort(Request $request){
       
        $sorts = $request->sort;
        foreach($sorts as $key=>$sort){
            Banner::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->destroy = 1;
        $banner->save();
        return redirect()->route('admin.banner.index')->with('success','Uğurla silindi');
    }
}
