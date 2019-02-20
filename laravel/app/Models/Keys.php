<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keys extends Model
{
    protected $table = 'keys';

    protected $fillable = [
    	'user_id', 'usages'
    ];

    protected $rules =[
    	'user_id' => 'required|integer',
    	'token' => 'required|min:10|unique:keys',
    	'usages' => 'required|integer',
    ];
}
