<?php

namespace App\Modules\Campaign\Model;
use App\Core_modules\User\Model\User;
use App\Modules\Bank_detail\Model\Bank_detail;
use App\Modules\Campaign_update\Model\Campaign_update;
use App\Modules\Category\Model\Category;
use App\Modules\City\Model\City;
use App\Modules\Donation\Model\Donation;
use App\Modules\Success_story\Model\Success_story;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use SoftDeletes, Sluggable;
    public  $table = 'campaign';

    protected $fillable = ['id','slug','category_id','user_id','campaign_name','location_id','thumbnail','video_url','body','target_amount','created_for','logo','stop_limit','status','minimum_tip','search', 'deleted_at','created_at','updated_at',];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'campaign_name'
            ]
        ];
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function location(){
        return $this->belongsTo(City::class, 'location_id', 'id');
    }

    public function success_story(){
        return $this->hasOne(Success_story::class, 'campaign_id', 'id');
    }

    public function campaign_updates(){
        return $this->hasMany(Campaign_update::class, 'campaign_id', 'id');
    }

    public function donations(){
        return $this->hasMany(Donation::class, 'campaign_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
