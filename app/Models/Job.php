<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];



    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function applications()
    {
        return $this->belongsToMany(User::class, 'job_user', 'job_id', 'user_id')->withTimestamps();
    }

    public function jobs_saved()
    {
        return $this->belongsToMany(Job::class, 'saved_jobs', 'job_id', 'user_id')->withTimestamps();
    }
}
