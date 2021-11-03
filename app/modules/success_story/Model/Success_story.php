<?php

namespace App\Modules\Success_story\Model;
use App\Modules\Campaign\Model\Campaign;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class Success_story extends Model
{
    use SoftDeletes, Sluggable;
    public  $table = 'success_story';

    protected $fillable = ['id','slug','campaign_id','title','body','by','deleted_at','created_at','updated_at',];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function campaign(){
        return $this->belongsTo(Campaign::class, 'campaign_id', 'id');
    }
}
