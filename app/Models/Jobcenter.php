<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Jobcenter extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function getLogoImageAttribute()
    {
        if($media = $this->getMedia('jobcenters')->last()){
            // $url = str_replace("storage","public", $media->getUrl());
            $url = $media->getUrl();
            return $url;
        }
        return asset('assets/img/job-center-item-img.png');
    }
}
