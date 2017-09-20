<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    public function getById($id){
    	$type = array(
    		'Art and Culture' => 1,
    		'Design Thinking' => 2,
    		'Entrepreneurship and Management' => 3,
    		'Science and Technology' => 4,
    		'Sociopolitical Issues' => 5
    	);

    	$data = $this->where('id',$id)->first();
    	$data->streamNum = $type[$data['type']];

    	return $data;
    }
}
