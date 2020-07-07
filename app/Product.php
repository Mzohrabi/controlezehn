<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App
 * @property $title
 * @property $price
 * @property $is_free
 * @property $description
 * @property $rate
 * @property $is_delete
 */
class Product extends Model
{
    protected $fillable = ['title', 'price', 'is_free', 'description', 'rate', 'is_deleted'];
    //
    public function productable(){
        return $this->morphto();
    }
}
