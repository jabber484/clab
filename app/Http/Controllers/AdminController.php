<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Excel;

class AdminController extends Controller
{
    public function importList(Request $request){
    	$excel = $request->file('file');
    	$filename = $excel->getClientOriginalName();
    	$ext = $excel->getClientOriginalExtension();

    	$tempname = md5(explode(".",$filename)[0].rand(1,100)).".".$ext;
    	$path = $excel->storeAs('public/temp', $tempname);
		$altpath = str_replace("public","storage",$path);

    	$reader = Excel::load($altpath, function($reader) {});
    	$result = $reader->get();

    	$message = array(
    		"inserted" => 0,
    	);
    	$data = array();
        foreach ($result as $key => $entry) {
        	$data[] = array(
                "sid" => $entry->sid,
                "role" => $entry->role,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            );
        }
        $message['inserted'] = DB::table('users')->count();
        DB::table('users')->insert($data);
        $message['inserted'] = DB::table('users')->count() - $message['inserted'];

    	Storage::delete($path);
    	return $message;
    }

    public function exportList(Request $export){
    	$data = DB::table('users')->get()->toArray();
    	$result = array();
		foreach ($data as $entry)
			$result[] = json_decode(json_encode($entry), true);
		$data = $result;

    	Excel::create('server_user_list', function($excel) use ($data) {
		    $excel->sheet('name', function($sheet) use ($data) {
		        $sheet->fromArray($data);
		    });
		})->download('xlsx');
    }
}
