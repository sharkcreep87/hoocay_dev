<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
    	'user_id', 'ref_no','description', 'amount','state'
    ];

   
}