<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'vhn_name',
        'mother_number',
        'reg_date',
        'last_anc_date',
        'edd_date',
        'mother_name',
        'delivery_date',
        'delivery_time_h',
        'delivery_time_m',
        'district_id',
        'hospital_type_id',
        'hospital_name',
        'who_conducted_delivery_id',
        'delivery_type',
        'complication',
        'delivery_outcome_id',
        'born_count',
        'live_birth',
        'still_birth',
        'method_id',
        'method_date',
        'discharge_date',
        'discharge_time_h',
        'discharge_time_m',
        'jsy_payment_status',
        'jsy_payment_date',
        'jsy_payment_amount',
    ];
}
