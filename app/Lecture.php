<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Lecture extends Model implements HasMedia
{
    use HasMediaTrait;
    //
    protected $fillable = ['lecturer_id','file_url','description','brief_description', 'image_url'];
    protected $appends = ['file', 'sound_image'];

    public function product(){
        return $this->morphOne('App\Product', 'productable',null,null);
    }

    public function lecturer() {
        return $this->belongsTo('App\Lecturer', 'lecturer_id');
    }


    public function getJalaliDateAttribute(){
        return Jalalian::fromDateTime(new Carbon($this->created_at))->format("H:i:s y/m/d");
    }

    public function getFileAttribute() {
        return route('api.products.audiobooks.sound', $this->id);
    }

    public function getSoundImageAttribute() {
        return route('api.products.audiobooks.image', $this->id);
    }

}
