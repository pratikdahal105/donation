<?php

namespace App\Modules\City\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use SoftDeletes;
    public  $table = 'cities';

    protected $fillable = ['id','name','state_id','deleted_at',];
}
