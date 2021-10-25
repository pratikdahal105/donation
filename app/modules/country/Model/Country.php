<?php

namespace App\Modules\Country\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use SoftDeletes;
    public  $table = 'countries';

    protected $fillable = ['id','code','name','phonecode',];
}
