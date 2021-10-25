<?php

namespace App\Modules\Campaign\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use SoftDeletes;
    public  $table = 'campaign';

    protected $fillable = ['id','slug','category_id','user_id','campaign_name','location_id','thumbnail','video_url','body','target_amount','created_for','logo','publish_date','stop_limit','status','minimum_tip','search','deleted_at','created_at','updated_at',];
}
