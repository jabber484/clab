<?php

namespace App\Http\Controllers;

use App\Weapon;

class WeaponController extends Controller
{
    public function bigGun() {
    	$gun = Weapon::getBigGun();
    	$caliber = 'Big Gun';
    	return view('gun', compact('gun'))->with('caliber', $caliber);
    }
    public function smallGun() {
    	$gun = Weapon::getSmallGun();
    	$caliber = 'Small Gun';
    	return view('gun', compact('gun'))->with('caliber', $caliber);
    }    
}
