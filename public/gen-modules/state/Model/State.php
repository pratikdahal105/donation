<?php

namespace App\Modules\State\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use SoftDeletes;
    public  $table = 'states';

    protected $fillable = ['id','name','country_id',];
}
