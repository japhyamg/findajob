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
        $jobs = auth('employer')->user()->jobs()->orderBy('created_at', 'DESC')->get();
        $applications = auth('employer')->user()->applications;
        // dd($applications);
        return view('employers.applications.index', compact('jobs', 'applications'));
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
        return response(['status' => 'success', 'application' => $application]);
    }
}
