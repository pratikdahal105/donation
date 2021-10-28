<?php

namespace App\Modules\City\Model;
use App\Modules\Campaign\Model\Campaign;
use App\Modules\State\Model\State;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use SoftDeletes;
    public  $table = 'cities';
    public $timestamps = false;

    protected $fillable = ['id','name','state_id','deleted_at',];

    public function campaign(){
        return $this->hasMany(Campaign::class, 'location_id', 'id');
    }

    public function state(){
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}
