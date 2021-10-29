<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {   
        $data['reservations'] = Reservation::all();
        return view('reservations.index', $data);
    }

    public function create()
    {   
        $data['title'] = __('Create Reservation');
        return view('reservations.create', $data);
    }

    public function store(Request $request)
    {   

        $table = Reservation::create([
            'name'  => $request->get('name'),
            'capacity' => $request->get('capacity'),
        ]);

        if(empty($table)){
            return redirect()->back()->withInput()->with('ERROR', __('Fail to created !!'));
        }

        return redirect()->route('reservations.index')->with('SUCCESS', __('Reservation has been created successfully.'));
    }

    public function edit(Reservation $reservation)
    {
        $data['title'] = __('Edit Reservation');
        $data['reservation'] = $reservation;
        return view('reservations.edit', $data);
    }

    public function update(Request $request, Reservation $reservation)
    {
        $params = $request->only(['name','capacity']);
 
        if($reservation->update($params)){
            return redirect()->route('reservations.index')->with('SUCCESS', __('Reservation has been updated successfully.'));
        }
        return redirect()->back()->withInput()->with('ERROR', __('Fail to updated'));
    }

    public function destroy(Reservation $reservation)
    {
        if($reservation->delete()){

            return redirect()->back()->with('SUCCESS', __('Reservation has been deleted successfully'));
        }
        return redirect()->back()->with('ERROR', __('Fail to delete this post !'));
    }
}
