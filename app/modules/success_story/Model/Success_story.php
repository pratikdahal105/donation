<?php

namespace App\Modules\Success_story\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class Success_story extends Model
{
    use SoftDeletes;
    public  $table = 'success_story';

    protected $fillable = ['id','slug','campaign_id','title','body','by','deleted_at','created_at','updated_at',];
}
