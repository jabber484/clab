<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event_type extends Model
{
    public function getAll(){
    	return $this->all()->groupBy('id')->toArray();
    }
}
