<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialist_id',
        'start_time',
        'end_time',
        'price',
        'phone',
    ];

    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }
}