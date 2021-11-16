<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index()
    {
        $jobs = Job::orderBy('created_at', 'DESC')->get();
        return view('front.index', compact('jobs'));
    }
    
    public function getstarted()
    {
        return view('front.getstarted');
    }

    public function show()
    {
        if(auth()->user()){
            return 'true';
        }
        return 'false';
    }

    public function contactus()
    {
        return view('front.contactus');
    }
}
