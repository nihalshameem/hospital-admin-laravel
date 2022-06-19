<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hsc_id',
        'visit_type',
        'rch_id',
        'anc_number',
        'ec_reg_date',
        'financial_year',
        'an_mother',
        'husband_name',
        'address',
        'whom_mobile',
        'mobile',
        'husband_mobile',
        'living_children',
        'cast',
        'religion',
        'dob',
        'gravida',
        'para',
        'pw_height',
        'mother_weight',
        'bp_systolic',
        'bp_diastolic',
        'bpl_apl',
        'last_visit_date_ec_tracking',
        'an_reg_date',
        'age',
    ];
}
