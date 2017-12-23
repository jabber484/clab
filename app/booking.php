<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class booking extends Model
{
    public function checkAvalible($item_id, $from, $to){
    	$carbon = new Carbon();

    	$result = $this->join('catalogs', 'catalogs.id', '=', 'bookings.item_id')
                    ->select("catalogs.name", "bookings.to")
                    ->where(function ($query) use ($from, $to) {
                        $query->whereBetween("from", [$from, $to])
                              ->orWhere(function ($query) use ($from, $to) {
                                    $query->whereBetween('bookings.to', [$from, $to]);
                                });
                    })
                    ->whereDate('to', '>=', $carbon->toDateString())
                    ->whereIn('item_id', $item_id)->get()->toArray();

    	return $result;
    }

    public function getAvalibleBookingID(){
        $result = $this->select("booking_id")->latest()->first();

        return $result['booking_id'] + 1 ;
    }
}
