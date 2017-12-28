<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Excel;
use App\user;
use App\login;
use Image;
use App\catalog;

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
                "email" => $entry->email,
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
                $sheet->fromArray(array(
                    array("sid","role","email"),
                    array("1155078888","student","1155078888@link.cuhk.edu.hk"),
                    array("1155078889","admin","1155078889@link.cuhk.edu.hk"),
                ),null,'A1',false,false);
            });
        })->download('xlsx');
    }

    public function promote(Request $request){
        $message = array(
            "success" => false,
            "message" => ""
        );
        $sid = $request->sid;

        if(DB::table('users')->where('sid',$sid)->count() == 0){
            $message['message'] = "User doesn't exist";
            return $message;
        }
        DB::table('users')->where('sid',$sid)->update(['role' => 'admin']);

        $message['success'] = true;
        $message['message'] = "Promoted ".$sid." to admin status";
        return $message;
    }

    public function demote(Request $request){
        $message = array(
            "success" => false,
            "message" => ""
        );
        $sid = $request->sid;

        if(DB::table('users')->where('sid',$sid)->count() == 0){
            $message['message'] = "User doesn't exist";
            return $message;
        }
        DB::table('users')->where('sid',$sid)->update(['role' => 'student']);

        $message['success'] = true;
        $message['message'] = "Promoted ".$sid." to student status";
        return $message;
    }

    public function email(Request $request, $type){
        if(!$request->has('email'))
            return "No Email Submitted";

        if($type == "add"){
            DB::table('masterEmail')->insert([
                [
                    'email' => $request->email, 
                    // "created_at" =>  \Carbon\Carbon::now(),
                    // "updated_at" => \Carbon\Carbon::now()
                ],
            ]);

            return "Added ".$request->email." to admin email list.";
        } else if($type == "delete"){
            if(DB::table('masterEmail')->where('email',$request->email)->count() == 0){
                return "Email doesn't exist";
            }
            
            DB::table('masterEmail')->where('email', $request->email)->delete();
            return "deleted ".$request->email." from admin email list.";
        }

    }

    public function catalogue(Request $request, $type){
        if($type == "type"){
            DB::table("catalog_types")->insert([
                [
                    'name' => $request->type, 
                    "created_at" =>  \Carbon\Carbon::now(),
                    "updated_at" => \Carbon\Carbon::now()
                ],
            ]);

            return "Inserted ". $request->type . " into catalogue type";
        } else if($type == "item"){
            if(!$request->hasFile('photo'))
                return "No photo!";

            //save entry
            $db = new catalog();
            $db->type = $request->type;
            $db->description = $request->description;
            $db->name = $request->name;

            $db->save();
            $id = $db->id;

            //save photo
            $file = $request->photo;
            $filename = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();

            $newname = md5(explode(".",$filename)[0].rand(1,100)).".".$ext;
            $path = $file->storeAs('public/temp',$newname);
            $path = str_replace("public","storage",$path);

            $im = Image::make($path)->fit(120, 150);
            $im->save('storage/catalogue/'.$id.".jpg");
            Storage::delete($path);

            return "Added Item";
        }

    }
}
