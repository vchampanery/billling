<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserAssignMaster extends Model
{
     public $table = 'user_assign_master';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_assign_master_id',
        'client_master_id',
        'user_master_id',
    ];


}
