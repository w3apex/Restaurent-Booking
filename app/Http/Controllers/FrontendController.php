<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class FrontendController extends Controller
{
    public function index()
    {   
        $data['reservations'] = Reservation::all();
        return view('welcome', $data);
    }

    public function single($id)
    {
        $data['reservation'] = Reservation::where('id', $id)->first();

        if ($data['reservation']) {
            return view('single-table', $data);
        }
        else{
            return redirect()->back();
        }
        
    }
}
