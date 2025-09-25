<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyArea extends Model
{
    protected $table = 'property_areas';
    protected $fillable = ['property_area_name', 'slug', 'status', 'property_type_id'];

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }
}
