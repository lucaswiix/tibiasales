<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
   protected $table = 'characters';

   protected $fillable = [
   	'user_id', 'world', 'name', 'level', 'vocation', 'magiclevel', 'image', 'mage_hat', 'neon_sparkid_mount', 'hide_name', 'hide_world', 'price', 'axe_fight', 'sword_fight', 'club_fight', 'shielding', 'description'
   ];

   protected $rules = [
   		'user_id'      => 'required',
   		'vocation'		=> 'required',
   		'world'      	=> 'required',
   		'name'     		=> 'required|min:2|max:30',
   		'level'     	=> 'required|min:1|max:4>',
   		'price'      	=> 'required',
         'description'  => 'max:150',
         'axe_fight'    => 'integer',
         'sword_fight'  => 'integer',
         'club_fight'   => 'integer',
         'magiclevel'   => 'integer',
         'shielding' => 'integer',
   		'distance'	=> 'integer',
   ];
}
