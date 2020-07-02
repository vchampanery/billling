<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PatientMaster extends Model
{
     public $table = 'patient_master';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_master_name',
        'patient_master_email',
        'patient_master_mobile_number',
        'patient_master_phone_number',
    ];


}
