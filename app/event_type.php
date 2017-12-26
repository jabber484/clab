<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event_type extends Model
{
    public function getAll(){
    	if(session('role') == 'admin'){
    		return $this->all()->toArray();
    	} else {
    		return $this->where('admin_only','0')->get()->toArray();
    	}
    }
}
