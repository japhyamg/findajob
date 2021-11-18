<?php

namespace App\Http\Controllers\Employers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $jobs = auth('employer')->user()->jobs()->orderBy('created_at', 'DESC')->get();
        // $applications = auth('employer')->user()->jobs;
        // dd($applications);
        return view('employers.applications.index', compact('jobs'));
    }
}
