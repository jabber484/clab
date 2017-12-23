<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Excel;
use App\user;
use App\login;

class AdminController extends Controller
{
    public function register(Request $request){
        $user = new user();
        $login = new login();

        $sid = $request->sid;
        $password = md5($request->pw);
        $password2 = md5($request->pw);

        if(!$user->checkUser($sid)){
            //not WYS
            return view('register')->with('error','0');

        } else if($user->checkRegistered($sid)){
            //registered
            return view('register')->with('error','1');

        } else if($password != $password2) { 
            //password not match
            return view('register')->with('error','2');

        } else {
            //is WYS and not registered and oassword ok
            $login->sid = $sid;
            $login->password = $password;

            $login->save();
            return view('success_response')->with('from','register');
        }
    }

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

    public function exportList(Request $request){
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

    public function exportSample(Request $request){
        Excel::create('server_user_list_sample', function($excel){
            $excel->sheet('user', function($sheet) {
                $sheet->fromArray(
                    array("sid","role")
                );
            });
        })->download('xlsx');
    }
}
