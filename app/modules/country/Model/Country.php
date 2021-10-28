<?php

namespace App\Modules\Country\Model;
use App\Modules\State\Model\State;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use SoftDeletes;
    public  $table = 'countries';
    public $timestamps = false;

    protected $fillable = ['id','code','name','phonecode','deleted_at',];

    public function states(){
        return $this->hasMany(State::class, 'country_id', 'id');
    }
}
