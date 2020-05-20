<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table ='attribute';
    public function product()
    {
        return $this->belongsTo('App\Model\Product','product_id');
    }

    public function specification()
    {
        return $this->hasMany('App\Model\SpecificationFeatures','attribute_id');
    }
}
