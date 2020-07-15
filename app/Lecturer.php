<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Lecturer extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['name', 'description'];

    protected $appends = ['lecturer_image'];
    //

    public function getJalaliDateAttribute() {
        return Jalalian::fromDateTime(new Carbon($this->created_at))->format("H:i:s y/m/d");
    }

    public function lectures() {
        return $this->hasMany('App\Lecture');
    }

    public function getLecturerImageAttribute() {
        if(count($this->getMedia('lecturer_image')) > 0 ){
            return $this->getMedia('lecturer_image')->first()->getUrl();
        }
        return "";

    }
}
