<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\catalog;
use App\project;

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

    public function project($id = 'all'){
        if($id == 'all'){
            return view('project');
        } else {
            $project = new project();
            $data = $project->getById($id);

            return view('projectDetail',compact('data'));
        }
    }
}
