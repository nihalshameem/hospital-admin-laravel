<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'rch_number',
        'infant_number',
        'birth_term',
        'infant_sex',
        'baby_cry',
        'birth_defect_id',
        'birth_weight',
        'feeding_status',
        'live_birth_order',
        'opv_o_dose',
        'bcg_dose',
        'hep_o_dose',
        'vitk_dose',
        'crs_status',
    ];
}
