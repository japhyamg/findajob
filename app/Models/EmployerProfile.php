<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class EmployerProfile extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function getProfileImageAttribute()
    {
        if($media = $this->getMedia('employers/profile')->last()){
            // $url = str_replace("storage","public", $media->getUrl());
            $url = $media->getUrl();
            return $url;
        }
        return asset('assets/img/profile-4.png');
    }
}
