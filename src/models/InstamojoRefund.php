<?php

namespace IlyasKazi\Instamojo\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstamojoRefund extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'instamojo_refund';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','refund_id','payment_id','status','type','body','refund_amount','total_amount','created_by'];
    
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
