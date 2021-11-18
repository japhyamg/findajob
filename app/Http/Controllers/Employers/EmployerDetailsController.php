<?php

namespace App\Http\Controllers\Employers;

use App\Models\Industry;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\EmployerProfile;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployerDetailsController extends Controller
{
    public function index()
    {
        $industries = Industry::orderBy('id', 'DESC')->get();
        return view('employers.companydetails.index', compact('industries'));
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

        // if($request->has('logo')){
        //     $temporaryfile = TemporaryFile::where('folder', $request->logo)->first();
        //     if($temporaryfile){
                // auth('employer')
                //     ->user()->profile
                //     ->addMedia(storage_path('app/employers/tmp/'.$request->logo.'/'.$temporaryfile->filename))
                //     ->toMediaCollection('employers/profile');

        //         rmdir(storage_path('app/employers/tmp/'.$request->logo));
        //         $temporaryfile->delete();
        //     }
        // }

        auth('employer')->user()->profile->update($request->except(['token','save','logo']));
        toastr()->success('Company Details Updated');
        return redirect(route('employer.company-details'))->with('success', 'Company Details Updated');
    }

    public function upload(Request $request)
    {
        // $user = auth('employer')->user();
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            // $filename = $file->getClientOriginalName();
            $filename = Str::random(10).'.'.$file->getClientOriginalExtension();
            $folder = uniqid() .'-'.now()->timestamp;


            $file->storeAs('employers/tmp/'.$folder, $filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename,
            ]);

            return $folder;

            // Image::make(storage_path('app/public/employers/profiles/'.$user->id.'/'.$filename))
            //         ->fit(50,50)
            //         ->save(storage_path('app/public/employers/profiles/'.$user->id.'/thumb-'.$filename));

            // $user->profile->update([
            //     'logo' => $filename
            // ]);


        }
        return '';
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
            return redirect()->back()->with("error","Current password does not match our record.");
            // return response(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::guard('employer')->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('employer.contact-person'))->with('status', 'Password Updated');
    }






}
