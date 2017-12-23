<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\catalog;
use App\project;
use App\catalog_type;
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

    public function newProject(){
        $event = new event_type();
        $type = $event->getAll();

        return view('CMS.NewProject',compact('type'));
    }

    public function newBooking($id = null){
        $catalog = new catalog();
        $catalog_type = new catalog_type();

        $type = $catalog_type->getAll();
        $payload = $catalog->getAll();

        foreach ($payload as $key => $entries) {
            $payload[$type[$key][0]['name']] = $payload[$key];
            unset($payload[$key]);
        }

        return view('CMS.NewBooking')
                ->with('payload',$payload)
                ->with('onBooking',1)
                ->with('prescripted',$id == null? 'X' : $id)
                ->with('year', \Carbon\Carbon::now()->year)
                ->with('month', \Carbon\Carbon::now()->month)
                ->with('day', \Carbon\Carbon::now()->day);
    }

    public function BookingDone(){
        
        return view('CMS.NewBooking_success');
    }

    public function getCatalog(){
        $catalog = new catalog();
        $catalog_type = new catalog_type();

        $type = $catalog_type->getAll();
        $payload = $catalog->getAll();

        foreach ($payload as $key => $entries) {
            $payload[$type[$key][0]['name']] = $payload[$key];
            unset($payload[$key]);
        }

        return view('catalog')->with('payload',$payload)->with('onBooking',0);
    }

    public function project($id = 'all'){
        $project = new project();
        
        if($id == 'all'){
            $project = new project();
            $data = array();

            $data['project'] = $project->getAll();

            foreach ($data['project'] as $key => $entry) {
                $data['search'][$entry['id']] = $entry['name'];
                //sterilize?
            }
            // dd($data['search']);

            return view('project',compact('data'));
        } else {
            $data = $project->getById($id);

            return view('projectDetail',compact('data'));
        }
    }

    public function login(){
        
        return view('gateway');
    }

}
