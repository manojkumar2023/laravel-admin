<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finish extends Model
{
    protected $table = 'finishes';
    protected $fillable = ['property_type_id', 'property_area_id', 'property_module_id', 'material_id', 'finish_name', 'slug', 'status'];

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function propertyArea()
    {
        return $this->belongsTo(PropertyArea::class, 'property_area_id');
    }

    public function propertyModule()
    {
        return $this->belongsTo(PropertyModule::class, 'property_module_id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }
}
