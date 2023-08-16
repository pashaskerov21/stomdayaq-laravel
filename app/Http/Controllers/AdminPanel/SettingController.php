<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $settings = Setting::findOrFail(1);
        return view('admin-panel.settings.index', compact('settings'));
    }
    public function update(Request $request){
        $this->validate($request, [
            'title.*' => 'required',
            'logo' => 'image|nullable|mimes:png,jpg,jpeg,svg',
            'favicon' => 'image|nullable|mimes:png,jpg,jpeg,svg',
        ]);
        
        $settings = Setting::findOrFail(1);
        $settings->title = $request->title;
        $settings->location_text = $request->location_text;
        $settings->location_url = $request->location_url;
        $settings->mail = $request->mail;
        $settings->phone = $request->phone;
        $settings->facebook = $request->facebook;
        $settings->instagram = $request->instagram;
        $settings->youtube = $request->youtube;
        $settings->description = $request->description;
        $settings->keywords = $request->keywords;
        $settings->author = $request->author;
        $settings->copyright = $request->copyright;
        $settings->report_total = $request->report_total;

        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $new_logo = time() . $file->getClientOriginalName();
            $file->move('uploads/settings', $new_logo);

            $settings->logo = $new_logo;
            $settings->logo_old = $new_logo;
        }else{
            $settings->logo = $request->logo_old;
        }
        if ($request->hasFile('favicon')) {
            $file = $request->favicon;
            $new_favicon = time() . $file->getClientOriginalName();
            $file->move('uploads/settings', $new_favicon);

            $settings->favicon = $new_favicon;
            $settings->favicon_old = $new_favicon;
        }else{
            $settings->favicon = $request->favicon_old;
        }
        $settings->save();
        return redirect()->route('admin.settings')->with('success','Məlumatlar uğurla yeniləndi');   
    }
}
