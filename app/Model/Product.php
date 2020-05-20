<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='product';
    public function attribute()
    {
        return $this->hasMany('App\Model\Attribute','product_id');
    }
}
