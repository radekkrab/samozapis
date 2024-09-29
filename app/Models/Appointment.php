<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'specialist_id',
        'appointment_time',
        'status',
    ];

    // Определение связи с пользователем
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Определение связи со специалистом
    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }
}
