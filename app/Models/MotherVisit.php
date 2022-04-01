<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotherVisit extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'visit_type',
        'rch_number',
        'an_reg_date',
        'financial_year',
        'an_visit_mother_name',
        'lmp_date',
        'edd_date',
        'within_pregnancy_week',
        'district',
        'checkup_place',
        'place_name',
        'abortion_if_any',
        'abortion_date',
        'abortion_type',
        'abortion_district',
        'abortion_facility',
        'abortion_pregnancy_week',
        'an_visit_date',
        'anc_period',
        'pregnancy_week',
        'an_mother_weight',
        'bp_systolic',
        'bp_diastolic',
        'hb',
        'urine_test',
        'urine_sugar',
        'urine_albumin',
        'blood_sugar_test',
        'fasting',
        'post_prandial',
        'gct',
        'gct_value',
        'tt_dose',
        'tt_date',
        'albendazole_date',
        'ifa_date',
        'fundal_size',
        'calcium_tablet',
        'calcium_date',
        'foetal_heart_rate',
        'foetal_position',
        'foetal_movement',
        'post_partum',
        'partum_other',
        'high_risk',
        'high_risk_other',
        'referral_date',
        'referral_district',
        'referral_facility',
        'referral_place',
        'ultrasonogram',
        'ultrasonogram_date',
        'scan_edd',
        'trimester',
        'ultrasonogram_fundal_size',
        'ultrasonogram__heart_rate',
        'ultrasonogram_position',
        'ultrasonogram_movement',
        'remark',
        'result',
    ];
}
