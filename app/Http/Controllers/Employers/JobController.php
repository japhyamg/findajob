<?php

namespace App\Http\Controllers\Employers;

use App\Models\Job;
use App\Models\Industry;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = auth('employer')->user()->jobs()->orderBy('created_at', 'DESC')->get();
        return view('employers.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $industries = Industry::orderBy('id', 'DESC')->get();
        return view('employers.jobs.create', compact('industries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'functions' => 'required',
            'industry' => 'required',
            'location' => 'required',
            'level' => 'required',
            'min_qualification' => 'required',
            'monthly_salary' => 'required',
            'experience' => 'required',
            'deadline' => 'required',
            'summary' => 'required',
            'requirement' => 'required'
        ]);


        auth('employer')->user()->jobs()->create([
            'title' => Str::title($request->title),
            'slug' => Str::slug($request->title.'-'.Str::random(6).'-'.Carbon::now()->format('YmdHis')),
            'functions' => $request->functions,
            'industry' => $request->industry,
            'location' => $request->location,
            'level' => $request->level,
            'min_qualification' => $request->min_qualification,
            'monthly_salary' => $request->monthly_salary,
            'experience' => $request->experience,
            'deadline' => $request->deadline,

            'summary' => $request->summary,
            'requirement' => $request->requirement,
            'apply_with_cover' => $request->apply_with_cover == 'on' ? true : false,
            'is_sponsored' => $request->is_sponsored == 'on' ? true : false
        ]);
        return redirect(route('employer.post-job'))->with('success', 'Job Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
