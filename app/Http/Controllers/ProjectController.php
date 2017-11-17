<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\project;
use Image;

class ProjectController extends Controller
{	
	public function newProject(Request $request){
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


    	return $project->id;
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
