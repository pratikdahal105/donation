<?php

namespace App\Core_modules\User\Model;

use App\Modules\Campaign\Model\Campaign;
use App\Modules\Donation\Model\Donation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

//class User extends Authenticatable implements MustVerifyEmail
class User extends Authenticatable
{
    use HasRoles;
//    use SoftDeletes, Notifiable;
    use SoftDeletes;
    public  $table = 'users';

    protected $fillable = ['id','name','username','control','last_visit','status','email', 'contact', 'password','remember_token','deleted_at','created_at','updated_at',];

    protected $hidden = [
      'password', 'remember_token',
    ];

    public function donations(){
        return $this->hasMany(Donation::class, 'user_id', 'id');
    }

    public function campaigns(){
        return $this->hasMany(Campaign::class, 'user_id', 'id');
    }

}
