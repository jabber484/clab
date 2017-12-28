<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\event_type;

class project extends Model
{
    public function getById($id){
        $event = new event_type();

    	$type = $event->getAllDisplay();
    	$data = $this->where('id',$id)->first()->toArray();

    	$data['streamNum'] = $data['type'];
        $data['type'] = $type[$data['streamNum']-1]['name'];

    	return $data;
    }

    public function getLatest($number){
        $event = new event_type();

    	$type = $event->getAllDisplay();
    	$data = $this->all()->reverse()->take($number)->toArray();

    	foreach ($data as $key => $value) {
			$data[$key]['streamNum'] = $value['type'];
			$data[$key]['type'] = $type[$data[$key]['streamNum']-1]['name'];
    	}
    
    	return $data;
    }

    public function getAll(){
        $event = new event_type();

    	$type = $event->getAllDisplay();
    	$data = $this->all()->reverse()->toArray();

    	foreach ($data as $key => $value) {
			$data[$key]['streamNum'] = $value['type'];
			$data[$key]['type'] = $type[$data[$key]['streamNum']-1]['name'];
    	}
    
    	return $data;
    }
}
