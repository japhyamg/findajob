<?php

namespace App\Http\Controllers\Employers\Auth;

use App\Models\Employer;
use App\Models\Industry;
use Illuminate\Support\Str;
use App\Models\EmployerProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::EMPLOYER_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'sex' => ['required', 'string', 'max:255'],
            'companyname' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'nationality' => ['required', 'string', 'max:255'],
            'industry' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Employer
     */
    protected function create(array $data)
    {
        // dd($data);

        $employer = Employer::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'sex' => $data['sex'],
            'position' => $data['position'],
            'phone' => $data['phone']
        ]);

        EmployerProfile::create([
            'employer_id' => $employer->id,
            'companyname' => $data['companyname'],
            'nationality' => $data['nationality'],
            'industry' => $data['industry'],
        ]);

        // $employer->profile([
        //     'companyname' => $data['companyname'],
        //     'nationality' => $data['nationality'],
        //     'industry' => $data['industry'],
        // ]);

        // return Employer::create([
        //     'firstname' => $data['firstname'],
        //     'lastname' => $data['lastname'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'sex' => $data['sex'],
        //     'companyname' => $data['companyname'],
        //     'position' => $data['position'],
        //     'phone' => $data['phone'],
        //     'nationality' => $data['nationality'],
        //     'industry' => $data['industry'],
        // ]);

        return $employer;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $industries = Industry::orderBy('id', 'DESC')->get();
        return view('employers.auth.register', compact('industries'));
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('employer');
    }
}
