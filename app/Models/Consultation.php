<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $fillable =[
       
        'patient_id',
        'doctor_id',
        'description',
        'approval_user_id',
        'approval_at',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function approval_user()
    {
        return $this->belongsTo(User::class);
    }
}
