<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SpecificationFeatures extends Model
{
    protected $table = 'features_specification';
    public function attribute()
    {
        return $this->belongsTo('App\Model\Attribute','attribute_id');
    }
}
