<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
    }

    public function newBooking(Request $request){
        //set time
        $this->time = new Carbon();
        $this->from = Carbon::createFromFormat('Y-m-d', $request->from);
        $this->to = Carbon::createFromFormat('Y-m-d', $request->to);

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

        if($this->message['success']){
            $data = array(
                "name" => $this->user,
                "booking" => json_decode($request->item),
                "from" => $this->from->toDateString(),
                "to" => $this->to->toDateString(),
            );

            $this->mail($data);
        }
    	return $this->message;
    }

    public function getBookingForCalender(Request $request){
        $result = DB::table('bookings')
            ->join("catalogs", 'catalogs.id', '=', 'bookings.item_id')
            ->select('name AS title','from AS start', "to As end")
            ->get()->toArray();

        //handle end date...
        foreach ($result as $key => $entry) {
            $newEnd = Carbon::createFromFormat('Y-m-d', $entry->end)->addDay(1);
            $result[$key]->end = $newEnd->toDateString();
        }

        return $result;
    }

    public function mail($data = array()){
        $data['item'] = DB::table('catalogs')->select('name')->whereIn('id',$data['booking'])->get()->toArray();
        $email = DB::table('users')->select('email')->where('sid','1155078921')->get()->toArray()[0]->email;

        Mail::send('email.confirmation', $data, function($message) {
            $message->to($email)->subject('c!ab Booking Confirmation');
        });
    }
}
