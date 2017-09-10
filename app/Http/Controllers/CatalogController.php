<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\catalog;

class CatalogController extends Controller
{	

    public function getCatalog(){
    	$catalog = new catalog();

    	$payload = $catalog->getAll();

    	return view('catalog')->with('payload',$payload);
    }
}
