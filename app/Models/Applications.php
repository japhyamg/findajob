<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Applications extends Pivot implements HasMedia
{
    use InteractsWithMedia;
    protected $table = 'job_user';

    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }

    public function applicant()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
