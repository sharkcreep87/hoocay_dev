<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    protected $fillable = [
    	'user_id', 'method', 'amount', 'status','ref_no' ,'data','state'
    ];

    // Get purchase's user
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
      public function owner(){
        return $this->belongsTo('App\Models\Admin\Owner','user_id','user_id');
    }
}
