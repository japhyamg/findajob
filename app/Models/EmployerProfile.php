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
        if($this->logo !== null){
            $media = $this->getMedia('employers/profile');
            return $media[0]->getUrl();
        }
        return asset('assets/img/profile-4.png');
    }
}
