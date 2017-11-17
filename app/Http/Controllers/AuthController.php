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
        $result = $this->login->auth($request->sid,$request->password);
        if($result == true){
            $request->session()->put('auth',"1");
            $request->session()->put('sid',$request->sid);

            return redirect('/');
        }

        //0 -> no match

        return view("gateway")->with("status","0");
    }

    public function logout(Request $request){
        $this->user->setAuth(0);
        $this->user = null;

        $request->session()->put('auth',"0");
        return redirect('/');
    }
}
