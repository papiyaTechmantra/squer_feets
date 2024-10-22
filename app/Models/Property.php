<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = "properties";

    public function Amenity() {
        return $this->belongsTo('App\Models\Amenity', 'ameniti_id', 'id');
    }

    public function PropertyVariation() {
        return $this->hasMany('App\Models\Property_variation', 'property_id', 'id');
    }
}
