<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    public function auth($sid,$password){
    	$result = $this->where('sid','=',$sid)->get();
    	if (count($result) != 0) {
    		return $password == $result[0]['password'];
    	}
    	
    	return 0;
    }
}
