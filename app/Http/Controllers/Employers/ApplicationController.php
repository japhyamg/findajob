<?php

namespace App\Http\Controllers\Employers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function index()
    {
        // $jobs = auth('employer')->user()->jobs()->orderBy('created_at', 'DESC')->get();
        $applications = auth('employer')->user()->applications->where('status', Application::STATUS_APPLIED);
        // dd($applications);
        return view('employers.applications.index', compact('applications'));
    }

    public function fetch(Request $request)
    {
        $application = Application::find($request->application)
                                    ->with(['applicant', 'applicant.education', 'applicant.employment_history', 'applicant.certificates', 'applicant.skills'])
                                    ->first();
        return response($application);
    }

    public function shortlist(Request $request)
    {
        $application = Application::find($request->application);

        $application->update([
            'status' => Application::STATUS_SHORTLISTED
        ]);


        return response(['status' => 'success', 'application' => $application]);
    }

    public function shortlisted()
    {
        $applications = auth('employer')->user()->applications->where('status', Application::STATUS_SHORTLISTED);
        // dd($applications);
        return view('employers.applications.shortedlisted', compact('applications'));
    }
}
