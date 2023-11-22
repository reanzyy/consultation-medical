<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'address',
        'phone',
        'rating_id',
    ];

    public function rating()
    {
        return $this->belongsTo(Rating::class);
    }
}
