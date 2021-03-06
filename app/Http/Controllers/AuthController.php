<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\login;

class AuthController extends Controller
{
    private $user;
	private $login;

	public function __construct(Request $request)
    {
        $this->user = new user();
        $this->login = new login();
    }

	public function login(Request $request){ //For Gateway
        //dd($request->sid,$request->password);
        $result = $this->login->auth($request->sid,md5($request->password));
        
        if($result){
            $request->session()->put('auth',"1");

            return redirect('/');
        }

        //0 -> no match
        
        $request->session()->forget('sid');
        $request->session()->forget('role');
        $request->session()->put('auth',"0");
        return view("gateway")->with("error","0");
    }

    public function logout(Request $request){
        // $this->user->setAuth(0);
        $this->user = null;

        $request->session()->forget('sid');
        $request->session()->forget('role');
        $request->session()->put('auth',"0");
        return redirect('/');
    }
}
