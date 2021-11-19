<?php

namespace App\Http\Controllers\Admin;

use App\Models\Nationality;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageNationalityController extends Controller
{
    public function index()
    {
        $countries = Nationality::all();
        return view('admin.managenationality.index', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate(['country' => 'required']);
        
        Nationality::create([
            'slug' => Str::slug($request->country),
            'country' => Str::title($request->country),
        ]);

        toastr()->success('Country Created');
        return redirect(route('admin.manage-country'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'country' => 'required'
        ]);

        $country = Nationality::findOrFail($request->id);
        $country->update([
            'country' => Str::title($request->country),
            'slug' => Str::slug($request->country)
        ]);
        toastr()->success('Country Updated');
        return redirect(route('admin.manage-country'));
    }

    public function delete(Request $request)
    {
        $country = Nationality::find($request->id);
        $country->delete();
        toastr()->success('Country Deleted');
        return redirect(route('admin.manage-country'));
    }
}
