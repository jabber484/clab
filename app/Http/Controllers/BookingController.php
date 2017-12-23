<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\booking;
use Carbon\carbon;

class BookingController extends Controller
{
    private $user;
	private $message;

    private $time;
    private $from;
    private $to;


	public function __construct(Request $request)
    {
    	$this->message = array();
    	$this->message['success'] = false;   
        $this->message['code'] = 0;   //0 -> invalid item | 1 -> invaild time | 2 -> invaild sid
    	$this->message['message'] = "";   

        $this->time = new Carbon();
        $this->from = Carbon::createFromFormat('Y-m-d', $request->from);
        $this->to = Carbon::createFromFormat('Y-m-d', $request->to);
    }

    public function newBooking(Request $request){
		if(!$request->session()->has('sid') || $request->session()->get('sid') == ''){ //safeguard
            $this->message['code'] = 2;   
            $this->message['message'] = "Invalid Sid";   
    		return $this->message;
        } else if ($this->time->gt($this->from) || $this->time->gt($this->to) || $this->to->lt($this->from)){
            $this->message['code'] = 1;   
            $this->message['message'] = "Invalid Booking Time Period";   
            return $this->message; 
        }
		$this->user = $request->session()->get('sid');

    	$booking = new booking();
    	$result = $booking->checkAvalible(json_decode($request->item), $request->from, $request->to);

    	if(count($result) > 0){ //have item NA
    		$this->message['item_NA_des'] = $result;
    	} else {
    		$this->message['success'] = true;   
    		$this->message['code'] = "OK";  
            $data = array();
            foreach (json_decode($request->item) as $key => $id) {
                $data[] = array(
                    "sid" => $this->user,
                    "from" => $this->from,
                    "to" => $this->to,
                    "booking_id" => $booking->getAvalibleBookingID(),
                    "item_id" => $id,
                    "created_at" =>  \Carbon\Carbon::now(),
                    "updated_at" => \Carbon\Carbon::now(),
                );
            } 

            $booking->insert($data);

    	}

    	return $this->message;
    }
}
