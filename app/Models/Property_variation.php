<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_variation extends Model
{
    use HasFactory;
    protected $table = "properties_variation";

    public function Property() {
        return $this->belongsTo('App\Models\Property', 'property_id', 'id');
    }
}
