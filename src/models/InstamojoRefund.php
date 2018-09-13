<?php

namespace IlyasKazi\Instamojo\Models;

use Illuminate\Database\Eloquent\Model;

class InstamojoRefund extends Model
{
    protected $table = 'instamojo_refund';

    protected $fillable = ['user_id','refund_id','payment_id','status','type','body','refund_amount','total_amount',];
}
