<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'passport_series' => 'string',
        'last_name' => 'string',
        'first_name' => 'string',
        'surname' => 'string',
        'position' => 'string',
        'phone' => 'integer',
        'address' => 'string',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
