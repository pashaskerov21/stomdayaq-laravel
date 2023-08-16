<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\WorkerRegistration;
use Illuminate\Http\Request;

class WorkerRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = WorkerRegistration::where('destroy',0)->get();
        return view('admin-panel.registration.workers.index', compact('workers'));
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
        $worker = WorkerRegistration::findOrFail($id);
        $worker_region = Region::findOrFail($worker->region)->name;
        return view('admin-panel.registration.workers.view', compact(['worker', 'worker_region']));
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
        $worker = WorkerRegistration::findOrFail($id);
        $worker->destroy = 1;
        $worker->save();
        return redirect()->route('admin.workers-registration.index')->with('success','Uğurla silindi');
    }
}
