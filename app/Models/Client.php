<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'client_name',
        'mobile',
        'email',
        'remarks',
        'budget',
        'status',
        'designer_name',
        'address',
        'next_follow_up_date',
        'generate_date',
    ];

    protected $casts = [
        'next_follow_up_date' => 'date',
        'generate_date' => 'date',
        'budget' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
