<?php

namespace App\Modules\Villa\Model;


use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    public  $table = 'tbl_villas';

    protected $fillable = ['id','name','cover_id','description','slug','no_of_guests','no_of_pools','wifi','bedrooms','bathrooms','latitude','longitude','location','security','tripadvisor_link','tv_satellite','cars','status','sequence','del_flag','created_at','updated_at','created_by','updated_by',];
}
