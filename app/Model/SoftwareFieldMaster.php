<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SoftwareFieldMaster extends Model
{
     public $table = 'software_field_master';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'software_field_master_id',
        'software_master_id',
        'module_master_id',
        'field_master_id',
    ];


}
