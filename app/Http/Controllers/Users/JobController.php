<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Application;
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
        // $job = Job::with(['employer', 'employer.profile'])->where('slug', $slug)->first();
        $job = Job::where('slug', $slug)->first();
        $job->applyroute = route('user.apply', $job->slug);
        $job->employer = $job->employer;
        $job->profile_image = $job->employer->profile->profile_image;
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

        $application = Application::create([
            'job_id' => $job->id,
            'user_id' => auth()->user()->id,
            'employer_id' => $job->employer_id,
            // 'coverletter' => $job->apply_with_cover == 1 ? true : false,
            'coverletter' => $request->hasFile('coverletter') ? true : false,
            'status' => Application::STATUS_APPLIED
        ]);

        // dd($application);

        if($request->hasFile('coverletter')){
            $application->addMediaFromRequest('coverletter')->toMediaCollection('coverletter');
        }

        // auth()->user()->applications()
        // ->attach($job->id, ['employer_id' => $job->employer_id,'coverletter' => $request->coverletter, 'resume' => $request->resume])
        // ->addMediaFromRequest('coverletter')
        // ->toMediaCollection('coverletter');

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

    public function applications()
    {
        return view('users.job.applications');
    }
}
