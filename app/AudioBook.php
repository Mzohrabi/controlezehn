<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudioBook extends Model
{
    //
    protected $fillable = ['sound_url','description', 'image_url'];

    public function product(){
        return $this->morphOne('App\Product', 'productable');
    }
}
