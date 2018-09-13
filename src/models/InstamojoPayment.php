<?php

namespace IlyasKazi\Instamojo\Models;

use Illuminate\Database\Eloquent\Model;

class InstamojoPayment extends Model
{
    protected $table = 'instamojo_payment';

    protected $fillable = ['user_id','buyer_email','buyer_name','buyer_phone','currency','amount','fees','longurl','payment_id',
                           'payment_request_id','purpose','shorturl','request_status','payment_status',];
}
