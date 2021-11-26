<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\Message;

class ResumeController extends Controller
{
    public function index()
    {
        // dd(auth()->user()->messages);


        $employer = Employer::find(1);
        $message = Message::create([
            'sender_type' => get_class(auth()->user()),
            'sender_id' => auth()->user()->id,
            'body' => 'Testing',
            'receiver_type' => get_class($employer),
            'receiver_id' => $employer->id
        ]);


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

    public function videocv()
    {
        $resumes  = auth()->user()->videoresumes();
        return view('users.resume.uploadvideocv', compact('resumes'));
    }

    public function storevideocv(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'resume' =>  'required|mimes:mp4|max:100000'
        ]);

        auth()
            ->user()
            ->addMediaFromRequest('resume')
            ->usingName(Str::title($request->title))
            ->toMediaCollection('video-resumes');

        toastr()->success('Video Resume Upload');
        return redirect(route('user.upload-video-cv'));
    }

    public function deletevideocv(Request $request)
    {
        $resume  = auth()->user()->videoresumes()->where('id', $request->mediaid)->first();
        // return response(['status'=>'success']);
        if($resume->delete()){
            return response(['status'=>'success']);
        }
        return response('error');
    }

}
