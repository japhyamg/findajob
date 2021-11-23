<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

// class Applications extends Pivot implements HasMedia
class Application extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $table = 'job_user';

    protected $guarded = [];

    protected $appends = ['cover_letter_file'];

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

    public function getCoverLetterFileAttribute()
    {
        if($media = $this->getMedia('coverletter')->last()){
            // $url = str_replace("storage","public", $media->getUrl());
            $url = $media->getUrl();
            return $url;
        }
        return '';
        // return asset('assets/img/profile-4.png');
    }
}
