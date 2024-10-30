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

    public function propertygroup() {
        return $this->belongsTo('App\Models\PropertyGroup', 'property_group_id', 'id');
    }

    public function floorplan() {
        return $this->hasMany('App\Models\FloorPlan', 'property_id', 'id');
    }
}
