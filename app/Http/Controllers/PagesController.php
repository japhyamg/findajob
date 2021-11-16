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

    public function aboutus()
    {
        return view('front.aboutus');
    }
    
    public function terms()
    {
        return view('front.terms');
    }

    public function nysc()
    {
        return view('front.nysc');
    }

    public function selfemployed()
    {
        return view('front.selfemployed');
    }

    public function privacy()
    {
        return view('front.privacy');
    }

    public function pricingplans()
    {
        return view('front.pricingplans');
    }

    public function faqs()
    {
        return view('front.faqs');
    }

    public function help()
    {
        return view('front.help');
    }

    public function contactus()
    {
        return view('front.contactus');
    }
}
