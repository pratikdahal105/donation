<?php

namespace App\Modules\Donation\Model;
use App\Core_modules\User\Model\User;
use App\Modules\Campaign\Model\Campaign;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use SoftDeletes;
    public  $table = 'donation';

    protected $fillable = ['id','slug','reference_no','user_id','campaign_id','amount','remarks','anonymous','status','deleted_at','created_at','updated_at',];

    public function campaign(){
        return $this->belongsTo(Campaign::class, 'campaign_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
