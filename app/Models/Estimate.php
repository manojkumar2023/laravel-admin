<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\EstimateItem;

class Estimate extends Model
{
    protected $guarded = [];
    /**
     * Cast date fields to Carbon instances so views can call ->format()
     */
    protected $casts = [
        'estimate_date' => 'date',
        'expiry_date' => 'date',
    ];

    public function items()
    {
        return $this->hasMany(EstimateItem::class);
    }
}
