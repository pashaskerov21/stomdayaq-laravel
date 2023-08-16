<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\WorkerApplicationArea;
use App\Models\WorkerRegistration;
use Illuminate\Http\Request;

class WorkerRegistrationController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'fullname' => 'required',
            'area' => 'required',
            'region' => 'required',
            'work_address' => 'required',
            'mail' => 'email|required',
            'image' => 'required|image|mimes:png,jpg,jpeg,svg',
        ]);
        
        if ($request->hasFile('image')) {
            $file = $request->image;
            $worker_img = time() . $file->getClientOriginalName();
            $file->move('uploads/registration/worker', $worker_img);
        }
        $worker_id = WorkerRegistration::create([
            'fullname' => $request->fullname,
            'region' => $request->region,
            'work_address' => $request->work_address,
            'mail' => $request->mail,
            'phone' => $request->phone,
            'image' => $worker_img,
        ])->id;
        for($i = 0; $i < count($request->area); $i++){
            WorkerApplicationArea::create([
                'worker_id' => $worker_id,
                'area_id' => $request['area'][$i],
            ]);
        }
        return redirect()->route('index')->with('form-success', 'true');

    }
}
