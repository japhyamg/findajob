<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jobcenter;

class ManageJobCenter extends Controller
{
    public function index()
    {
        $locations = Location::orderBy('created_at', 'DESC')->get();
        $jobcenters = Jobcenter::orderBy('created_at', 'DESC')->get();
        return view('admin.jobcenters.index', compact('locations', 'jobcenters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'location' => 'required',
            'open' => 'required',
            'close' => 'required',
        ]);

        Jobcenter::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'location' => $request->location,
            'open' => $request->open,
            'close' => $request->close,
        ]);

        toastr()->success('Job Center Created');
        return redirect(route('admin.job-centers'));
    }



}
