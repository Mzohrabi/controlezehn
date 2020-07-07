<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

/**
 * Class AudioBook
 * @package App
 * @property $sound_url
 * @property $description
 * @property $image_url
 */
class AudioBook extends Model
{
    //
    protected $fillable = ['sound_url','description', 'image_url'];

    public function product(){
        return $this->morphOne('App\Product', 'productable');
    }

    public function getJalaliDateAttribute(){
        return Jalalian::fromDateTime(new Carbon($this->created_at))->format("H:i:s y/m/d");
    }
}
