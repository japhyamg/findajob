<?php

namespace App\Http\Controllers\Admin;

use App\Models\Industry;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageIndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::orderBy('id', 'DESC')->get();
        return view('admin.manageindustry.index', compact('industries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'industry' => 'required|unique:industries,name'
        ]);

        Industry::create([
            'name' => Str::title($request->industry),
            'slug' => Str::slug($request->industry)
        ]);

        return redirect(route('admin.manage-industry'))->with('success', 'Industry Added');


        // dd($request);
    }

    public function update(Request $request)
    {
        $request->validate([
            'industry' => 'required|unique:industries,name'
        ]);

        $industry = Industry::findOrFail($request->id);
        $industry->update([
            'name' => Str::title($request->industry),
            'slug' => Str::slug($request->industry)
        ]);
        // dd($industry);

        // Industry::create([
        //     'name' => Str::title($request->industry),
        //     'slug' => Str::slug($request->industry)
        // ]);

        return redirect(route('admin.manage-industry'))->with('success', 'Industry Added');
    }

    public function delete(Request $request)
    {
        // dd($request->all());
        $industry = Industry::find($request->id);
        $industry->delete();
        return redirect(route('admin.manage-industry'))->with('success', 'Industry Deleted');
    }

}
