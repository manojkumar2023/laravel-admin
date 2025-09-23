<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\EstimateItem;

class Estimate extends Model
{
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(EstimateItem::class);
    }
}
