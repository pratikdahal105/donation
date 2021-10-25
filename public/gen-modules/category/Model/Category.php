<?php

namespace App\Modules\Category\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SoftDeletes;
    public  $table = 'category';

    protected $fillable = ['id','slug','name','logo','thumbnail','status','deleted_at','created_at','updated_at',];
}
