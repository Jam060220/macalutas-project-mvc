<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Reservation::latest()->paginate(8);
    
        return view('reservations.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 8);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required',
            'number_of_people' => 'required',
            'message' => 'required'
        ]); 

        Reservation::create($request->all());
     
        return redirect()->route('reservations.index')
                        ->with('success','Reservation created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservations
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservations)
    {
        return view('reservations.show', compact('reservations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservations
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservations)
    {
        return view('reservations.edit',compact('reservations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservations)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required',
            'number_of_people' => 'required',
            'message' => 'required'
    
        ]);

        $reservations->update($request->all());
    
        return redirect()->route('reservations.index')
                        ->with('success','Reservation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservations)
    {
        $reservations->delete();
    
        return redirect()->route('reservations.index')
                        ->with('success','Reservation deleted successfully');
    }
}
