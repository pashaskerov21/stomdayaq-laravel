<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use App\Models\GalleryImages;
use Illuminate\Http\Request;

class GalleryImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = GalleryImages::where('destroy',0)->orderBy('sort')->get();
        return view('admin-panel.gallery.images.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = GalleryCategory::where('destroy',0)->orderBy('sort')->get();
        return view('admin-panel.gallery.images.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $gallery_img = time() . $file->getClientOriginalName();
            $file->move('uploads/gallery', $gallery_img);
        }
        GalleryImages::create([
            'category_id' => $request->category,
            'image' => $gallery_img,
            'image_old' => $gallery_img,
        ]);
        return redirect()->route('admin.gallery.index')->with('success', 'Uğurla əlavə edildi');
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
        $galleryImg = GalleryImages::findOrFail($id);
        $categories = GalleryCategory::where('destroy',0)->orderBy('sort')->get();
        return view('admin-panel.gallery.images.edit',compact(['galleryImg','categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'category' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,svg',
        ]);
        $galleryImg = GalleryImages::findOrFail($id);
        $galleryImg->category_id = $request->category;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $gallery_img = time() . $file->getClientOriginalName();
            $file->move('uploads/gallery', $gallery_img);

            $galleryImg->image = $gallery_img;
        }else{
            $galleryImg->image = $galleryImg->image_old;
        }
        $galleryImg->save();

        return redirect()->route('admin.gallery.index')->with('success', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }

    public function sort(Request $request){
       
        $sorts = $request->sort;
        foreach($sorts as $key=>$sort){
            GalleryImages::where('id', $sort)->update(['sort' => $key]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $galleryImg = GalleryImages::findOrFail($id);
        $galleryImg->destroy = 1;
        $galleryImg->save();
        return redirect()->route('admin.gallery.index')->with('success','Uğurla silindi');
    }
}
