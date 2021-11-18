<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Employer;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index()
    {
        $jobs = Job::orderBy('created_at', 'DESC')->get();
        $employers = Employer::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('front.index', compact('jobs', 'employers'));
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

    public function jobsearch()
    {
        return view('front.jobsearch');
    }

    public function employers()
    {
        return view('front.employers');
    }

    public function jobseekers()
    {
        return view('front.jobseekers');
    }

    public function loopvc()
    {
        return view('front.loopvc');
    }

    public function ayeen()
    {
        return view('front.ayeen');
    }

    public function nde()
    {
        return view('front.nde');
    }

    public function cvcreator()
    {
        return view('front.cvcreator');
    }

    public function jobcenters()
    {
        return view('front.jobcenters');
    }

    public function jobseekervideos()
    {
        return view('front.jobseekervideos');
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
