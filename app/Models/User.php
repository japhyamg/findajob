<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'avatar',
        'phone',
        'dofb',
        'gender',
        'nationality',
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

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function employment_history()
    {
        return $this->hasMany(Employment::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function skills()
    {
        return $this->hasMany(LangOrSkills::class);
    }

    public function applications()
    {
        return $this->belongsToMany(Job::class, 'job_user', 'user_id', 'job_id')->withTimestamps();
    }

    public function savedjobs()
    {
        return $this->belongsToMany(Job::class, 'saved_jobs', 'user_id', 'job_id')->withTimestamps();
    }

    public function getProfileImageAttribute()
    {
        if($this->avatar !== null){
            $media = $this->getMedia('avatars');
            return $media[0]->getUrl();
        }
        // if($media = $this->getMedia('employers/profile')->last()){
        //     $url = str_replace("storage","public", $media->getUrl());
        //     return $url;
        // }
        // if($this->avatar !== null){
        //     $media = $this->getMedia('avatars');
        //     $url = str_replace("storage","public",$media[0]->getFullUrl());
        //     return $url;
        // }
        return asset('assets/img/profile-4.png');
    }

}
