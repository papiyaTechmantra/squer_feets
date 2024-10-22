<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $table = "leads";
    
    public function Property() {
        return $this->belongsTo('App\Models\Property', 'property_id', 'id');
    }
    
}
