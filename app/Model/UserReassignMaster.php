<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserReassignMaster extends Model
{
     public $table = 'user_reassign_master';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_reassign_master_id',
        'client_master_id',
        'user_master_id',
        'date',
    ];


}
