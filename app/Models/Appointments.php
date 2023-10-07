<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'date',
        'time',
        'gender',
        'inquiry',
        'description',
        'appointment_code',
        'doctor_id'
    ];
}