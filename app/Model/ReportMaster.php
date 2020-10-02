<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReportMaster extends Model
{
     public $table = 'report_master';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'report_master_id',
        'client_master_id',
        'date',
        'software_field_master_id',
        'value',
        'updated_by',
    ];


}
