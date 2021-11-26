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
            'logo' => 'required|mimes:png,jpeg,jpg,gif|max:1000'
        ]);

        Jobcenter::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'location' => $request->location,
            'open' => $request->open,
            'close' => $request->close,
        ])->addMediaFromRequest('logo')
        ->toMediaCollection('jobcenters');;

        toastr()->success('Job Center Created');
        return redirect(route('admin.job-centers'));
    }

    public function delete(Request $request)
    {
        $jobcenter = Jobcenter::find($request->id);

        $jobcenter->delete();

        toastr()->success('Job Center Deleted');
        return redirect(route('admin.job-centers'));
    }



}
