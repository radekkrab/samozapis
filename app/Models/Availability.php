<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    protected $fillable = [
        'specialist_id',
        'date',
        'time_slot',
        'is_booked',
    ];

    // Определение связи со специалистом
    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }
}
