<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catalog extends Model
{
    public function getAll(){
    	
		return $this->all()->groupBy('type')->toArray();
    }
}
