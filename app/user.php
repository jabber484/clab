<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class user extends Model
{
	public function checkUser($sid){
    	
    	return count($this->where('sid', $sid)->get()->toArray()) != 0;
	}
    
    public function checkRegistered($sid){
    	
    	return count(DB::table('logins')->where('sid', $sid)->get()->toArray()) != 0;
	}
}
