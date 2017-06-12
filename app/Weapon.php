<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    public static function getBigGun() {
    	return static::where('dmg','>','5000')->get();
    }

    public static function getSmallGun() {
    	return static::where('dmg','<=','5000')->get();
    }
}
