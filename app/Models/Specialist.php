<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'specialization',
        'bio',
        'schedule',
    ];


    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function availability()
    {
        return $this->hasMany(Availability::class);
    }

    public function getScheduleAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setScheduleAttribute($value)
    {
        $this->attributes['schedule'] = json_encode($value);
    }

    public function addAvailability($day, $timeSlot)
    {
        $schedule = $this->schedule;
        if (!isset($schedule[$day])) {
            $schedule[$day] = [];
        }
        $schedule[$day][] = $timeSlot;
        $this->schedule = $schedule;
        $this->save();
    }

    public function removeAvailability($day, $timeSlot)
    {
        $schedule = $this->schedule;
        if (isset($schedule[$day])) {
            $schedule[$day] = array_diff($schedule[$day], [$timeSlot]);
            $this->schedule = $schedule;
            $this->save();
        }
    }
}
