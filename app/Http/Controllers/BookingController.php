<?php

namespace App\Http\Controllers;

use App\Jobs\BookingReservation;
use App\Models\Booking;
use App\Models\Reservation;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {   
        $current_time = Carbon::now("Asia/Dhaka")->toTimeString();
        Booking::where('out_time','<', $current_time)->update(array('status' => 0));

        //$data['bookings'] = Booking::where('status', 1)->get();
        $data['bookings'] = Booking::all();
        return view('bookings.index', $data);
    }

    public function store(Request $request)
    {   
        //$current_time = Carbon::now("Asia/Dhaka")->toTimeString(); 
        //$reservation_id = $request->get('reservation_id');
        $in_time  = date('H:i:s', strtotime($request->get('in_time')));
        $out_time = date('H:i:s', strtotime($request->get('out_time')));
        $date     = date('Y-m-d', strtotime($request->get('date')));
        
        $available_time = Booking::where('reservation_id', $request->get('reservation_id'))
        ->where(function($q) use($date, $in_time, $out_time){
            $q->where('date', $date)
            ->where('in_time','<=',$in_time)
            ->where('out_time','>',$in_time); 
        })
        ->orWhere(function($q) use($date, $out_time, $in_time){
            $q->where('date', $date)
            ->where('in_time','<',$out_time)
            ->where('out_time','>=',$out_time); 
        })
        ->first();

        if (!$available_time) {
            $user_id = Auth::user()->id;
            $table = Booking::create([
                'reservation_id' => $request->get('reservation_id'),
                'user_id'  => $user_id,
                'date'     => date('Y-m-d', strtotime($request->get('date'))),
                'in_time'  => $request->get('in_time'),
                'out_time' => $request->get('out_time'),
                'status'   => '1',
            ]);

            if(empty($table)){
                return redirect()->back()->withInput()->with('ERROR', __('Fail to created !!'));
            }
   
            return redirect()->route('home')->with('SUCCESS', __('Bookings has been created successfully.'));
        } 
        else {
            // return redirect()->back()->withInput()->with('ERROR', __('Already booked .. !!'));
            return redirect()->back();
        }
    }

    public function checkBookingTime($reservation_id, $date, $in_time, $out_time)
    {
        $available_time = Booking::where('reservation_id', $$reservation_id)
        ->where(function($q) use($date, $in_time){
            $q->where('date', $date)
            ->where('in_time','<=',$in_time)
            ->where('out_time','>',$in_time); 
        })
        ->orWhere(function($q) use($date, $out_time){
            $q->where('date', $date)
            ->where('in_time','<',$out_time)
            ->where('out_time','>=',$out_time); 
        })
        ->first();

        if(!$available_time){
            return true;
        }
        else {
            return false;
        }
    }

    public function edit(Request $request)
    {
        //

    }

    public function update(Request $request, Booking $booking)
    {
        //
    }

    public function destroy(Booking $booking)
    {
        /*  //$current_time = Carbon::now("Asia/Dhaka")->format('h:i:s');
        $current_time = Carbon::now("Asia/Dhaka")->toTimeString(); 
        //$current = date('H:i:s');
        $in_time = date('H:i:s', strtotime("18:21:00"));
        $out_time = date('H:i:s', strtotime("18:25:00"));
        $date = date('Y-m-d', strtotime("2021-10-28"));


        $available_time = Booking::where('reservation_id', 1)
        ->where(function($q)use($date,$in_time,$out_time){
            $q->where('date', $date)
            ->where('in_time','<=',$in_time)
            ->where('out_time','>',$in_time); 
        })
        ->orWhere(function($q)use($date,$in_time,$out_time){
            $q->where('date', $date)
            ->where('in_time','<',$out_time)
            ->where('out_time','>=',$out_time); 
        })
        ->first();
        dd($available_time,$in_time,$out_time,$date); */
    }
}
