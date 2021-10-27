<?php

namespace App\Modules\Campaign\Model;
use App\Modules\Bank_detail\Model\Bank_detail;
use App\Modules\Category\Model\Category;
use App\Modules\City\Model\City;
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
        $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function location(){
        $this->belongsTo(City::class, 'location_id', 'id');
    }
}
