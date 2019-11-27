<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Event;
use App\Inscription;
use Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with('inscription')
                    ->get();
        return response()->json(['events' => $events], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return('holanda');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date_time'=>'required',
            'name'=>'required',
            'price'=>'required',
            'place'=>'required', 
            'description'=>'required',
            'large_description'=>'required',
            'capacity'=>'required'
        ]);
        
         if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $event = Event::create($request->all());
        $user = Auth::user();

        $inscription = new Inscription();
        $inscription->user_id = $user->id;
        $inscription->user_role = 0;
        $inscription->event_id = $event->id;
        $inscription->date = $event->date_time;
        $inscription->save();

         return ('registro guardado');


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
}
