<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Weapon;
use App\pit_ticket;
use App\name;

class AddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        switch ($request->type) {
            case 'weapon':
                $new = new Weapon;

                $new->name = $request->name;        
                $new->dmg = $request->dmg;

                $new->save();
                return view('/new');
                break;

            case 'hero':
                $new = new name;

                $new->name = $request->name;        
                $new->img_link = 'asset/hero/'.$request->link;

                $new->save();

                return redirect()->action('HeroController@fetchAll');
                break;
            case 'battle':
                $new = new pit_ticket;

                $new->hero_id = $request->id;        
                $new->pit = $request->pit;

                $new->save();
                return redirect()->action('PitTicketController@fetchAll');
                break;
            default:
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function load()
    {
        $pit = pit_ticket::getPit();
        $hero = name::all()->sortBy('name')->pluck('name','id');

        return view('/new',compact('hero'))->with('pit', $pit);
    }
}
