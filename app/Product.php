<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'price', 'is_free', 'description', 'rate', 'is_delete'];
    //
    public function productable(){
        return $this->morphto();
    }
}
