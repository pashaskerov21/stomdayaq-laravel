<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\PatientRegistration;
use App\Models\Region;
use Illuminate\Http\Request;

class PatientRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = PatientRegistration::where('destroy',0)->get();
        return view('admin-panel.registration.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = PatientRegistration::findOrFail($id);
        $patient_region = Region::findOrFail($patient->region)->name;
        return view('admin-panel.registration.patients.view', compact(['patient', 'patient_region']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = PatientRegistration::findOrFail($id);
        $patient->destroy = 1;
        $patient->save();
        return redirect()->route('admin.patients-registration.index')->with('success','Uğurla silindi');
    }
}
