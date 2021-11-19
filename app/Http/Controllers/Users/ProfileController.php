<?php

namespace App\Http\Controllers\Users;

use App\Models\Industry;
use App\Models\Education;
use App\Models\Employment;
use App\Models\Certificate;
use App\Models\Nationality;
use Illuminate\Support\Str;
use App\Models\LangOrSkills;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $educations = auth()->user()->education()->orderBy('id','DESC')->get();
        $employments = auth()->user()->employment_history()->orderBy('id','DESC')->get();
        $certificates = auth()->user()->certificates()->orderBy('id','DESC')->get();
        $skills = auth()->user()->skills()->orderBy('id','DESC')->get();
        $industries = Industry::orderBy('id', 'DESC')->get();
        $countries = Nationality::orderBy('id', 'DESC')->get();
        return view('users.profile.index', compact('educations', 'industries', 'countries', 'employments', 'certificates', 'skills'));
    }

    public function updateprofile(Request $request)
    {
        $request->validate([
            'identification_type' => 'required',
            'identification_no' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'dofb' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'nationality' => 'required',
        ]);

        if($request->hasFile('avatar') && $request->file('avatar')->isValid()){
            auth()
                ->user()
                ->addMediaFromRequest('avatar')
                ->toMediaCollection('avatars');
        }

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

    public function deleteeducation(Request $request)
    {
        if($education = Education::find($request->id)){
            $education->delete();
            toastr()->success('Education Deleted');
            return redirect(route('user.profile'));
        }else{
            toastr()->error('Invalid Action');
            return redirect(route('user.profile'));
        }
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

    public function deleteemploymenthistory(Request $request)
    {
        if($employment = Employment::find($request->id)){
            $employment->delete();
            toastr()->success('Employment History Deleted');
            return redirect(route('user.profile'));
        }else{
            toastr()->error('Invalid Action');
            return redirect(route('user.profile'));
        }
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

    public function deletecertificate(Request $request)
    {
        if($certificate = Certificate::find($request->id)){
            $certificate->delete();
            toastr()->success('Certificate Deleted');
            return redirect(route('user.profile'));
        }else{
            toastr()->error('Invalid Action');
            return redirect(route('user.profile'));
        }
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

    public function deleteskill(Request $request)
    {
        if($skill = LangOrSkills::find($request->id)){
            $skill->delete();
            toastr()->success('Skill Deleted');
            return redirect(route('user.profile'));
        }else{
            toastr()->error('Invalid Action');
            return redirect(route('user.profile'));
        }
    }

    public function updatepassword(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|confirmed|min:8'
        ]);

        if (Hash::check($request->current_password, Auth::guard()->user()->password) == false)
        {
            toastr()->success('Current password does not match our record.');
            return redirect()->back()->with("error","Current password does not match our record.");
            // return response(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::guard()->user();
        $user->password = Hash::make($request->password);
        $user->save();
        toastr()->success('Password Updated');
        return redirect(route('user.profile'))->with('status', 'Password Updated');
    }

}
