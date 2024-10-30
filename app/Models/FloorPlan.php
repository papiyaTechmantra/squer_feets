<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorPlan extends Model
{
    use HasFactory;
    protected $table = "floor_plans";

    public function property() {
        return $this->belongsTo('App\Models\Property', 'property_id', 'id');
    }

    // public function PropertyVariation() {
    //     return $this->hasMany('App\Models\Property_variation', 'property_id', 'id');
    // }
    
}
