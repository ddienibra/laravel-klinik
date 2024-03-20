<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    use HasFactory;
    //fillable
    protected $fillable = [
        'doctor_id',
        'day',
        'time',
        'status',
        'note',
    ];
    //relationship
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
