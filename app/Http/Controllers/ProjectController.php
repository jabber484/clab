<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\project;
use Carbon\carbon;
use Image;

class ProjectController extends Controller
{	
	private $message;

    private $time;
    private $from;
    private $to;


	public function __construct(Request $request)
    {
    	$this->message = array();
    	$this->message['success'] = false;   
        $this->message['code'] = 0;
    	$this->message['message'] = "";   
    }

	public function newProject(Request $request){
        //set time		
        $this->time = new Carbon();
        $this->from = Carbon::createFromFormat('Y-m-d', $request->fDate);
        $this->to = Carbon::createFromFormat('Y-m-d', $request->tDate);

		if(!$request->session()->has('sid') || $request->session()->get('sid') == ''){ //safeguard
            $this->message['code'] = 2;   
            $this->message['message'] = "Invalid Sid";   
    		return $this->message;
        } else if ($request->Idea != 1 && ($this->time->gt($this->from) || $this->time->gt($this->to) || $this->to->lt($this->from))){
            $this->message['code'] = 1;   
            $this->message['message'] = "Invalid Booking Time Period";   
            return $this->message; 
        } else if(!$request->session()->has(['title','short','full','alias','contact'])){
            $this->message['code'] = 3;   
            $this->message['message'] = "Required fields must be filled";   
            return $this->message; 
        }

    	$project= new project();

    	$project->name = $request->title;
		$project->type = $request->cat;
		$project->isIdea = $request->Idea == 1 ? 1 : 0;
		$project->fromDate = $request->fDate;
		$project->toDate = $request->tDate;
		$project->picture = $request->picture;
		$project->thumbnail = str_replace("large","thumbnail",$request->picture);
		$project->short_des = $request->short;
		$project->description = $request->full;
		$project->sid = $request->sid;
		$project->alias = $request->alias;
		$project->contact = $request->contact;

		$project->save();
		$this->message['success'] = true;   
		$this->message['id'] = $project->id;   
    	return $this->message;
    }
    
    public function newProjectImage(Request $request){
    	$file = $request->file;
    	$filename = $file->getClientOriginalName();
    	$ext = $file->getClientOriginalExtension();

    	$newname = md5(explode(".",$filename)[0].rand(1,100)).".".$ext;
		$path = $file->storeAs('public/project/large',$newname);
		$path = str_replace("public","storage",$path);

		$im = Image::make($path)->resize(null, 200, function ($constraint) {
		    $constraint->aspectRatio();
		});
		$im->save(str_replace("large","thumbnail",$path));

    	return $path;
    }
}
