<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastObstetricHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'total_pregnancy',
        'last_complication_id',
        'last_other_complication',
        'present_complication_id',
        'present_other_complication',
        'outcome_id',
    ];
}
