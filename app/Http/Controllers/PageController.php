<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\catalog;

class PageController extends Controller
{	

    public function landing(){
    	
    	return view('landing');
    }

    public function about(){
    	
    	return view('about');
    }

    public function contact(){
    	
    	return view('contact');
    }

    public function guideline(){
    	
    	return view('guideline');
    }

    public function project(){
        
        return view('project');
    }
}
