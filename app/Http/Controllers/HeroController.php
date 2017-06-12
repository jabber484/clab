<?php

namespace App\Http\Controllers;

use App\Name;

class HeroController extends Controller
{
    public function fetchAll() {
    	$hero = Name::all()->sortBy('name');

    	return view('hero', compact('hero'));
    }
}
