<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catalog_type extends Model
{
    public function getAll(){
    	return $this->all()->groupBy('id')->toArray();
    }
}
