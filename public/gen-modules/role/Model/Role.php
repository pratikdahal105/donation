<?php

namespace App\Modules\Role\Model;


use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public  $table = 'roles';

    protected $fillable = ['id','name','display_name','description','created_at','updated_at',];
}
