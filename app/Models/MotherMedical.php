<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotherMedical extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'pw_rch_reg_number',
        'an_reg_date',
        'financial_year',
        'mother_name',
        'lmp_date',
        'within_pregnancy_week',
        'edd_date',
        'mother_blood_grp_status',
        'blood_grp',
        'past_illness_id',
        'other_past_illness',
        'is_vdrl_rpp',
        'vdrl_date',
        'vdrl_result',
        'eligible_for_mrmbs',
    ];
}
