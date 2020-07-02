<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BillingMaster extends Model
{
     public $table = 'billing_master';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['biiling_date','units_visits_billed','charges_billed'];


}
