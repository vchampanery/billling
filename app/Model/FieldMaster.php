<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FieldMaster extends Model
{
     public $table = 'field_master';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'field_master_name',
    ];


}
