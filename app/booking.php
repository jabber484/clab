<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class booking extends Model
{
    public function checkAvalible($item_id, $from, $to){
    	$carbon = new Carbon();

    	// have bug
    	$result = $this->join('catalogs', 'catalogs.id', '=', 'bookings.item_id')
    			->select("catalogs.description", "bookings.to")
    			->whereDate('to', '>=', $from)
    			->whereDate('to', '>=', $carbon->toDateString())
    			->whereIn('item_id', $item_id)->get()->toArray();

    	return $result;
    }
}
