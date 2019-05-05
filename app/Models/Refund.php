<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    protected $fillable = [
    	'user_id', 'ref_no', 'booking_id','description','status','state', 'amount'
    ];

   public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function booking(){
        return $this->belongsTo('App\Models\Admin\Booking','booking_id');
    }

     public function payment(){
        return $this->belongsTo('App\Models\Payment_info','user_id','user_id');
    }
}
