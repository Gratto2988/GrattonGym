<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        
        
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
        
        $request->validate([
                'class_id' => 'required|int',
            ]);

        $id = Auth::id();

        //INSERT INTO `ggym`.`bookings` (`class_id`,`user_id`, `mentor_id`) VALUES (1,1,1);

        $booking = DB::table('bookings')->insert(
            [   
                'class_id' => request('class_id'),
                'user_id' => $id
                
            ]
        );
        
        $request->session()->flash('status', 'You Have Successfully Booked Your Class!');
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Booking $booking)
    {

        $request->validate([
                'booking_id' => 'required|int',
            ]);

        // $booking = Booking::find(request('booking_id'));

        $booking = Booking::where('id', request('booking_id'))->delete();

        //$deleteBooking = DB::table('bookings')->where('id', request('booking_id'))->delete();

        return redirect('/home');
    }
}
