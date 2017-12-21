<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\booking;

class BookingController extends Controller
{
    private $user;
	private $message;

	public function __construct(Request $request)
    {
    	$this->message = array();
    	$this->message['success'] = false;   
    	$this->message['item_NA'] = true;   

    }

    public function newBooking(Request $request){
		if(!$request->session()->has('sid') || $request->session()->get('sid') == '') //safeguard
    		return $this->message;
		$this->user = $request->session()->get('sid');

    	$booking = new booking();
    	$result = $booking->checkAvalible(json_decode($request->item), $request->from, $request->to);

    	if(count($result) > 0){ //have item NA
    		$this->message['item_NA_des'] = $result;
    	} else {
    		$this->message['success'] = true;   
    		$this->message['item_NA'] = false;   
    	}

    	return $this->message;
    }
}
