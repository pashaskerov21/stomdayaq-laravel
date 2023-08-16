<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\PatientRegistration;
use Illuminate\Http\Request;

class PatientRegistrationController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'fullname' => 'required',
            'region' => 'required',
            'address' => 'required',
            'card_front' => 'required|image|mimes:png,jpg,jpeg,svg',
            'card_back' => 'required|image|mimes:png,jpg,jpeg,svg',
        ]);
        if ($request->hasFile('card_front')) {
            $file = $request->card_front;
            $front_img = time() . $file->getClientOriginalName();
            $file->move('uploads/registration/patient', $front_img);
        }
        if ($request->hasFile('card_back')) {
            $file = $request->card_back;
            $back_img = time() . $file->getClientOriginalName();
            $file->move('uploads/registration/patient', $back_img);
        }
        PatientRegistration::create([
            'fullname' => $request->fullname,
            'region' => $request->region,
            'address' => $request->address,
            'phone' => $request->phone,
            'card_front' => $front_img,
            'card_back' => $back_img,
        ]);
        return redirect()->route('index')->with('form-success', 'true');
    }
}
