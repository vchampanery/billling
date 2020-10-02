<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SoftwareMaster extends Model
{
     public $table = 'software_master';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'software_master_name',
    ];


}
