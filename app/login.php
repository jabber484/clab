<?php

namespace App;

use Illuminate\Session;
use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    public function auth($sid,$password){
    	$result = $this->where('sid', $sid)->get()->toArray();

    	//dd($result,$sid,$password);
    	if (count($result) != 0  && $password == $result[0]['password']) {
            session(['sid' => $result[0]['sid']]);
    		return true;
    	}
    	
    	return false;
    }
}
