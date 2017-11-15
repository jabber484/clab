<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\catalog;
use App\project;
use App\event_type;

class PageController extends Controller
{	

    public function landing(){
    	$project = new project();
        $data = array();

        $data['project'] = $project->getLatest(4);

    	return view('landing',compact('data'));
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

    public function newproject(){
        $event = new event_type();
        $type = $event->getAll();

        return view('CMS.NewProject',compact('type'));
    }

    public function project($id = 'all'){
        $project = new project();
        
        if($id == 'all'){
            $project = new project();
            $data = array();

            $data['project'] = $project->getAll();

            return view('project',compact('data'));
        } else {
            $data = $project->getById($id);

            return view('projectDetail',compact('data'));
        }
    }
}
