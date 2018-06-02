<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Booking;
use App\Mentor;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
//-------------------------------------------------------------------

    public function index()
    {
        $booking = static::show();

        return view('home', compact('booking'));
    }

//-------------------------------------------------------------------
    
    public function show()
    {
        $id = Auth::id();

        $booking = Booking::where('user_id', $id)->orderBy('id', 'desc')->paginate(5);

        return $booking;
    }

}
