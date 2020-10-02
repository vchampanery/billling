<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ModuleMaster extends Model
{
     public $table = 'module_master';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'module_master_name',
    ];


}
