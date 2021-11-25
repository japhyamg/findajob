<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResumeController extends Controller
{
    public function index()
    {
        $resumes  = auth()->user()->resumes();
        return view('users.resume.uploadcv', compact('resumes'));
    }

    public function storecv(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'resume' =>  'required|mimes:pdf,doc,docx|max:60000'
        ]);

        auth()
            ->user()
            ->addMediaFromRequest('resume')
            ->usingName(Str::title($request->title))
            ->toMediaCollection('resumes');

        toastr()->success('Resume Upload');
        return redirect(route('user.upload-cv'));
    }

    public function deletecv(Request $request)
    {
        $resume  = auth()->user()->resumes()->where('id', $request->mediaid)->first();
        // return response(['status'=>'success']);
        if($resume->delete()){
            return response(['status'=>'success']);
        }
        return response('error');
    }

}
