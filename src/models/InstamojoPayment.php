<?php

namespace IlyasKazi\Instamojo\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstamojoPayment extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'instamojo_payment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','buyer_email','buyer_name','buyer_phone','currency','amount','unit_price', 'fees','longurl','payment_id', 'payment_request_id','purpose','shorturl','request_status','payment_status', 'affiliate_commission', 'instrument_type', 'billing_instrument', 'created_by'];
    
    
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->created_by = \Auth::user()->id;
        });

        static::updating(function($model) {
            $model->updated_by = \Auth::user()->id;
        });
    }
    
    /**
     * [user description]
     * @return [type] [description]
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
