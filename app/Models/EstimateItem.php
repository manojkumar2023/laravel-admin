<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstimateItem extends Model
{
    protected $guarded = [];

    public function estimate()
    {
        return $this->belongsTo(Estimate::class);
    }
}
