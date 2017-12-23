<?php

namespace App;

use Illuminate\Session;
use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    public function auth($sid, $password){
    	$result = $this
            ->join('users', 'users.sid', '=', 'logins.sid')
            // ->join('catalogs', 'catalogs.id', '=', 'bookings.item_id')
            ->where('users.sid', $sid)->get()->toArray();

    	if (count($result) != 0  && $password == $result[0]['password']) {
            session(['sid' => $result[0]['sid']]);
            session(['role' => $result[0]['role']]);

    		return true;
    	}
    	
    	return false;
    }
}
