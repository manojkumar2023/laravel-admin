<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Agent extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'agents';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'mobile', 'address', 'status', 'password'
    ];

    protected $hidden = ['password'];
}
