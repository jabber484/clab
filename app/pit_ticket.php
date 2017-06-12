<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class pit_ticket extends Model
{
	public static function getPitTally($id) {  
		return static::selectRaw('pit, COUNT(*) as count')->where('hero_id','=',$id)->groupBy('pit')->orderBy('pit', 'asc')->get(); 
	}  	

    public static function getTickets($id) {
    	return static::select('hero_id','pit')->where('hero_id','=',$id)->get();
    }	

    public static function getAll() {
    	return static::join('names', 'pit_tickets.hero_id', '=', 'names.id')->get();
    }

	public static function getPit()
	{
	  $type = DB::select(DB::raw('SHOW COLUMNS FROM pit_tickets WHERE Field = "pit"'))[0]->Type;
	  preg_match('/^enum\((.*)\)$/', $type, $matches);
	  $enum = array();
	  foreach( explode(',', $matches[1]) as $value )
	  {
	    $v = trim( $value, "'" );
	    $enum = array_add($enum, $v, $v);
	  }
	  return $enum;
	}
}
