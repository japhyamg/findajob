<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageLocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('admin.managelocation.index', compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate(['location' => 'required']);
        
        Location::create([
            'slug' => Str::slug($request->location),
            'name' => Str::title($request->location),
        ]);

        toastr()->success('Location Created');
        return redirect(route('admin.manage-location'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'location' => 'required'
        ]);

        $location = Location::findOrFail($request->id);
        $location->update([
            'name' => Str::title($request->location),
            'slug' => Str::slug($request->location)
        ]);
        toastr()->success('Location Updated');
        return redirect(route('admin.manage-location'));
    }

    public function delete(Request $request)
    {
        $location = Location::find($request->id);
        $location->delete();
        toastr()->success('Location Deleted');
        return redirect(route('admin.manage-location'));
    }
}
