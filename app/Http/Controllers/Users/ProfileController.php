<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $educations = auth()->user()->education()->orderBy('id','DESC')->get();
        $industries = Industry::orderBy('id', 'DESC')->get();
        return view('users.profile.index', compact('educations', 'industries'));
    }

    public function updateprofile(Request $request)
    {
        $request->validate([
            'identification_type' => 'required',
            'identification_no' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'dofb' => 'required',
            'sex' => 'required',
            'phone' => 'required',
            'nationality' => 'required',
        ]);


        auth()->user()->update($request->except(['token', 'save']));

        // dd($request->all());
        toastr()->success('Profile Updated');
        return redirect(route('user.profile'));
    }


    public function addeducation(Request $request)
    {
        $request->validate([
            'institution' => 'required',
            'min_qualification' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);


        auth()->user()->education()->create($request->except(['token', 'save']));

        // dd($request->all());
        toastr()->success('Profile Updated');
        return redirect(route('user.profile'))->with('success', 'Profile Updated');
    }

    public function addemploymenthistory(Request $request)
    {

        $request->validate([
            'employer_name' => 'required',
            'job_title' => 'required',
            'job_level' => 'required',
            'country' => 'required',
            'industry' => 'required',
            'function' => 'required',
            'monthly_salary' => 'required',
            'work_type' => 'required',
            'city' => 'required',
            'start_date' => 'required',
            'end_date' => 'required_without:currently_work_here',
            'responsibilities' => 'required'
        ]);

        auth()->user()->employment_history()->create([
            'employer_name' => $request->employer_name,
            'job_title' => $request->job_title,
            'job_level' => $request->job_level,
            'country' => $request->country,
            'industry' => $request->industry,
            'function' => $request->function,
            'monthly_salary' => $request->monthly_salary,
            'work_type' => $request->work_type,
            'city' => $request->city,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'currently_work_here' => $request->currently_work_here == 'on' ? true : false,
            'responsibilities' => $request->responsibilities
        ]);
        toastr()->success('Employment History Added');
        return redirect(route('user.profile'))->with('success', 'Employment History Added');
    }

    public function addcertificate(Request $request)
    {
        $request->validate([
            'certificate' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        auth()->user()->certificates()->create([
            'certificate' => $request->certificate,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);
        toastr()->success('Certificate/Reward History Added');
        return redirect(route('user.profile'))->with('success', 'Certificate/Reward History Added');
    }

    public function addskill(Request $request)
    {
        $request->validate([
            'skill' => 'required',
            'proficiency' => 'required'
        ]);

        auth()->user()->skills()->create([
            'skill' => $request->skill,
            'proficiency' => $request->proficiency
        ]);
        toastr()->success('Language/Skill History Added');
        return redirect(route('user.profile'))->with('success', 'Language/Skill History Added');
    }

}
