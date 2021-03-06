<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * Class AudioBook
 * @package App
 * @property $sound_url
 * @property $description
 * @property $image_url
 */
class AudioBook extends Model implements HasMedia
{
    use HasMediaTrait;
    //
    protected $fillable = ['sound_url','description', 'image_url'];
    protected $appends = ['sound_file', 'sound_image'];
    public function product(){
        return $this->morphOne('App\Product', 'productable');
    }

    public function getJalaliDateAttribute(){
        return Jalalian::fromDateTime(new Carbon($this->created_at))->format("H:i:s y/m/d");
    }

    public function getSoundFileAttribute() {
        return route('api.products.audiobooks.sound', $this->id);
    }

    public function getSoundImageAttribute() {
        return route('api.products.audiobooks.image', $this->id);
    }

}
