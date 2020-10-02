<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClientMaster extends Model
{
     public $table = 'client_master';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_master_id',
        'client_master_name',
        'software_master_id',
    ];


}
