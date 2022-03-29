<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPlace extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'hospital_type_id',
        'district',
        'hospital_name',
    ];
}
