<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'name' => 'string',
        'director' => 'string',
        'address' => 'string',
        'email' => 'string',
        'website' => 'string',
        'phone' => 'integer'
    ];
}
