<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class name extends Model
{
    public static function getHero($x) {
    	return static::where('id',$x);
    }
}
