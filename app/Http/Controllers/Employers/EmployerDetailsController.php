<?php

namespace App\Http\Controllers\Employers;

use App\Models\Employer;
use App\Models\Industry;
use App\Models\Nationality;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Models\EmployerProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployerDetailsController extends Controller
{
    public function index()
    {
        $industries = Industry::orderBy('id', 'DESC')->get();
        $countries = Nationality::orderBy('id', 'DESC')->get();
        return view('employers.companydetails.index', compact('industries','countries'));
    }


    public function updatecompanydetails(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'companyname' => ['required', 'string', 'max:255'],
            'nationality' => ['required', 'string', 'max:255'],
            'industry' => ['required', 'string', 'max:255'],
        ]);

        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            auth('employer')
                ->user()->profile
                ->addMediaFromRequest('logo')
                ->toMediaCollection('employers/profile');
        }

        auth('employer')->user()->profile->update($request->except(['token','save','logo']));
        toastr()->success('Company Details Updated');
        return redirect(route('employer.company-details'))->with('success', 'Company Details Updated');
    }

    public function contactperson()
    {
        return view('employers.companydetails.contactperson');
    }

    public function updatecontactperson(Request $request)
    {
        $request->validate([
            'identification_type' => 'required',
            'identification_no' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'dofb' => 'required',
            'sex' => 'required',
            'phone' => 'required',
            'position' => 'required',
        ]);


        auth('employer')->user()->update($request->except(['token','save']));
        toastr()->success('Contact Person Details Updated');
        return redirect(route('employer.contact-person'))->with('success', 'Contact Person Details Updated');
    }

    public function updatepassword(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|confirmed|min:8'
        ]);

        if (Hash::check($request->current_password, Auth::guard('employer')->user()->password) == false)
        {
            toastr()->error('Current password does not match our record.');
            return redirect()->back()->with("error","Current password does not match our record.");
            // return response(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::guard('employer')->user();
        $user->password = Hash::make($request->password);
        $user->save();
        toastr()->success('Password Updated');
        return redirect(route('employer.contact-person'))->with('status', 'Password Updated');
    }






}
