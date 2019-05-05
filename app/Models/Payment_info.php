<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment_info extends Model
{
      protected $fillable = [
    	'user_id', 'bank','acct_no', 'acct_name'
    ];
}
