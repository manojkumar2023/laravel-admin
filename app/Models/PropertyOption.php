<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyOption extends Model
{
    use HasFactory;

    protected $table = 'property_options';
    protected $fillable = ['property_option_name', 'slug', 'status', 'property_type_id'];

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }
}
