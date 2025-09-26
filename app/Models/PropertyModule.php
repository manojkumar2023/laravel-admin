<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyModule extends Model
{
    protected $table = 'property_modules';
    protected $fillable = ['property_module_name', 'slug', 'status', 'property_type_id', 'property_area_id'];

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function propertyArea()
    {
        return $this->belongsTo(PropertyArea::class, 'property_area_id');
    }
}
