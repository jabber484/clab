<?php

namespace App\Http\Controllers;

use App\Weapon;
use App\pit_ticket;
use App\name;

class ChartController extends Controller
{

    public function loadBattleTally($id) {
    	$name = name::getHero($id)->select('name','id')->get();
    	$tally = pit_ticket::getPitTally($id);

   		return compact('tally','name');
    }

    public function loadOne($id) {
        $fetch = static::loadBattleTally($id);
        if(count($fetch['name'])==0)
            return redirect()->action('AddController@load');

        $data = array($id => $fetch);

        $headcount = name::select('id','name')->where('id','=',$id)->pluck('name','id');

        return view('/charts',compact('data'),compact('headcount'));
    }

    public function load() {
    	$headcount = pit_ticket::join('names','pit_tickets.hero_id','names.id')->pluck('names.name','names.id');
        $count = 0;
        $data = array();
        foreach ($headcount as $key => $h) {
            $fetch = static::loadBattleTally($key);
            $data[$key] = $fetch;
        }

        return view('/charts',compact('data'),compact('headcount'));

    }

}
