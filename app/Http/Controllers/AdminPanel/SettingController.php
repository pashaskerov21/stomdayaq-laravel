<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\SettingTranslate;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $settings = Settings::findOrFail(1);
        return view('admin-panel.settings.index', compact('settings'));
    }
    public function update(Request $request){
        $this->validate($request, [
            'logo' => 'image|nullable|mimes:png,jpg,jpeg,svg',
            'favicon' => 'image|nullable|mimes:png,jpg,jpeg,svg',
        ]);
        $settings = Settings::findOrFail(1);
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
        for($i = 0; $i < count($request->lang); $i++){
            SettingTranslate::where(['setting_id' => 1, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
                'address' => $request['address'][$i],
                'description' => $request['description'][$i],
                'keywords' => $request['keywords'][$i],
                'author' => $request['author'][$i],
                'copyright' => $request['copyright'][$i]
            ]);
        }
        $settings->address_url = $request->address_url;
        $settings->mail = $request->mail;
        $settings->phone = $request->phone;
        $settings->facebook = $request->facebook;
        $settings->instagram = $request->instagram;
        $settings->youtube = $request->youtube;
        $settings->report_total = $request->report_total;
        $settings->save();
        return redirect()->route('admin.settings')->with('success','Məlumatlar uğurla yeniləndi');
    }
}
