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
        'hospital_id',
        'start_time',
        'end_time',
        'status',
        'price',
        'phone',
        'location',
    ];

    protected $dates = [
    'start_time',
    'end_time'
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }

}
