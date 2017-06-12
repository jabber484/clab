<?php

namespace App\Http\Controllers;

use App\pit_ticket;

class PitTicketController extends Controller
{
    public function fetchAll() {
    	$record = pit_ticket::getAll();

    	return view('trail', compact('record'));
    }
}
