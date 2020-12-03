<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WebPortalMaster extends Model
{
     public $table = 'web_portal_master';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'web_portal_id',
        'web_portal_client_id',
        'web_portal_insurance_pms',
        'web_portal_username',
        'web_portal_password',
        'web_portal_weblink',
        'web_portal_register_email',
        'web_portal_registered_phone',
        'web_portal_security_q',
        'web_portal_security_a',
    ];


}
