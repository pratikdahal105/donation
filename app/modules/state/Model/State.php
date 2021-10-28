<?php

namespace App\Modules\State\Model;
use App\Modules\City\Model\City;
use App\Modules\Country\Model\Country;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use SoftDeletes;
    public  $table = 'states';
    public $timestamps = false;

    protected $fillable = ['id','name','country_id','deleted_at',];

    public function country(){
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function cities(){
        return $this->hasMany(City::class, 'state_id', 'id');
    }
}
