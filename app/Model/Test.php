<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
     public $table = 'test';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'c_id',
        'date',
        's_id',
        'val',
        'updated_by',
    ];

  
    
}
