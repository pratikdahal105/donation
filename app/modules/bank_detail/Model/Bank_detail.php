<?php

namespace App\Modules\Bank_detail\Model;
use App\Modules\Campaign\Model\Campaign;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class Bank_detail extends Model
{
    use SoftDeletes;
    public  $table = 'bank_detail';

    protected $fillable = ['id','bank_name','bank_branch','acc_type','routing_number','acc_number','bic_swift','acc_holder_name','recipient_address','transfer_reason','deleted_at','created_at','updated_at',];

    public function campaign(){
        $this->belongsTo(Campaign::class, 'bank_detail_id', 'id');
    }
}
