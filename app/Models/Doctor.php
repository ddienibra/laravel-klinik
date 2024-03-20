<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    //     $table->id();
    //     $table->string('doctor_name');
    //     $table->string('doctor_specialist');
    //     $table->string('doctor_phone');
    //     $table->string('doctor_email');
    //     $table->string('photo')->nullable();
    //     $table->string('address')->nullable();
    //     $table->string('sip');
    //     $table->timestamps();
    //
    protected $fillable = [
        'doctor_name',
        'doctor_specialist',
        'doctor_phone',
        'doctor_email',
        'photo',
        'address',
        'sip',
        'id_ihs',
        'nik',
    ];
}
