<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = ['description', 'brief_description'];

    public function product(){
        return $this->morphOne('App\Product', 'productable',null,null);
    }
}
