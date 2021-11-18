<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employer extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'sex',
        'email',
        'password',
        'phone',
        'position',
        'dofb',
        'identification_type',
        'identification_no',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token, 'employer.password.reset', 'employers'));
    }


    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification('employer.verification.verify'));
    }

    public function profile()
    {
        // return $this->hasOne(EmployerProfile::class, 'employer_id', 'id');
        return $this->hasOne(EmployerProfile::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    // public function getApplicationsAttribute()
    // {
    //     // $jobs = $this->jobs->pluck('id');

    //     $applications = $this->jobs()->with('applicants')->get();
    //     // dd($applications);
    //     return $applications;

    // }

    // public function getApplicationsAttribute()
    // {
    //     $jobs = $this->jobs;
    //     $applications = [];
    //     foreach($jobs as $job){
    //         // $ap = $job->applicants;
    //         // dd($ap);
    //         $applications[] = $job->applicants->toArray();
    //     }

    //     dd($applications);

    //     return $applications;
    // }

    public function getApplicantsAttribute()
    {
        $jobs = $this->jobs;
        $count = 0;
        foreach($jobs as $job){
            $count += $job->applicants->count();
        }

        return $count;
    }
}
