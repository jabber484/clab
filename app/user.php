<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    private $auth;

    public function setAuth($value){
    	$this->auth = $value;
	}

	public function getAuth(){
    	return $this->auth;
	}
    
}
