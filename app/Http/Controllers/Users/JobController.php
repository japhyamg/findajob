<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'DESC')->get();
        return view('users.job.index', compact('jobs'));
    }

    public function savedjobs()
    {
        $jobs = auth()->user()->savedjobs()->orderBy('created_at', 'DESC')->get();
        // dd($jobs);
        return view('users.job.savedjobs', compact('jobs'));
    }

    public function fetchjob($slug)
    {
        $job = Job::where('slug', $slug)->first();
        $job->applyroute = route('user.apply', $job->slug);
        return response($job);
    }

    public function apply($slug, Request $request)
    {
        $job = Job::where('slug', $slug)->first();

        // dd($job, $request);

        if(auth()->user()->applications()->where('job_id', $job->id)->exists()){
            toastr()->info('Already applied');
            // return redirect(route('user.find'))->with('error', 'Already applied');
            return redirect(route('user.find'));
        }

        auth()->user()->applications()->attach($job->id, ['coverletter' => $request->coverletter, 'resume' => $request->resume]);
        toastr()->success('Successfully applied');
        // return redirect(route('user.find'))->with('success', 'Successfully applied');
        return redirect(route('user.find'));
    }

    public function save($slug)
    {
        $job = Job::where('slug', $slug)->first();
        if(auth()->user()->savedjobs()->where('job_id', $job->id)->exists()){
            auth()->user()->savedjobs()->detach($job->id);
            return response('Removed from saved jobs');
        }else{
            auth()->user()->savedjobs()->attach($job->id);
            return response('Added to saved jobs');
        }
    }
}
