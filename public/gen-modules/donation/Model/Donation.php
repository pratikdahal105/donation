<?php

namespace App\Modules\Donation\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use SoftDeletes;
    public  $table = 'donation';

    protected $fillable = ['id','slug','reference_no','user_id','campaign_id','amount','remarks','anonymous','status','deleted_at','created_at','updated_at','tip',];
}
