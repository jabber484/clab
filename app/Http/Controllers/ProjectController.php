<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\project;

class ProjectController extends Controller
{	
	public function newProject(Request $request){
    	$project= new project();

    	$project->name = $request->title;
		$project->type = $request->cat;
		$project->isIdea = $request->Idea == 1 ? 1 : 0;
		$project->fromDate = $request->fDate;
		$project->toDate = $request->tDate;
		$project->short_des = $request->short;
		$project->description = $request->full;
		$project->alias = $request->alias;
		$project->contact = $request->contact;

		$project->save();

    	return $project->id;
    }
    
}
