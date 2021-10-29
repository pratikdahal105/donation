<?php

namespace App\Modules\Campaign_update\Model;
use App\Modules\Campaign\Model\Campaign;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class Campaign_update extends Model
{
    use SoftDeletes;
    public  $table = 'campaign_updates';

    protected $fillable = ['id','campaign_id','body','deleted_at','created_at','updated_at',];

    public function campaign(){
        return $this->belongsTo(Campaign::class, 'campaign_id', 'id');
    }
}
