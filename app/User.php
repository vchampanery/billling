<?php


namespace App;


use Illuminate\Notifications\Notifiable;
//use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\URL;


use Auth;


class User extends Authenticatable
{
    use  Notifiable;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
//        $user = Auth::user();
//        $rout =  \Request::route()->getName();
//       
//        if( ($user && $rout) || (!$user && $rout == 'users.index')){
//        static::addGlobalScope('assigned_projects', function (Builder $builder)  {
//			    $builder->where('email', '<>','vt@gmail.com');
//			});
//        } 
        
//        //TODO::optimize here, put this condition inside scope fun,
//        $logged_in_user_customer_id = (Auth::check()) ? Auth::user()->user_customer_id : null;
//        if(!empty($logged_in_user_customer_id))
//		{
//		    // Return all projects which is related to customer even not have any portfolio
//			static::addGlobalScope('assigned_projects', function (Builder $builder) use ($logged_in_user_customer_id) {
//			    $builder->where('project_customer_id', '=',$logged_in_user_customer_id);
//			});
//		}
	}
    
}