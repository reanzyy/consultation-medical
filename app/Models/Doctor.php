<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'hospital_id',
        'specialist_id',
        'start_date',
        'end_date',
        'status',
        'price',
        'phone',
        'location',
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