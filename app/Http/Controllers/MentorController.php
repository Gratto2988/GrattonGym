<?php

namespace App\Http\Controllers;

use App\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MentorController extends Controller
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
        return view('/admin/addMentor');
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

    public function searchMentor(Request $request)
    {
            $request->validate([
                'search' => 'required|string|max:25', 
            ]);

        // SELECT * FROM classes
        // WHERE class LIKE  request('search'). '%';

        $mentors = DB::table('mentors')
                        ->where('firstname', 'like', '%' . request('search') . '%')
                        ->orWhere('surname', 'like', '%' . request('search') . '%')
                        ->paginate(10);
        
        return view('admin/allMentors', compact('mentors'));
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
            'firstname' => 'required|string|max:30',
            'surname' => 'required|string|max:30'
            ]);

        $mentor = DB::table('mentors')->insert(
            [   
                'firstname' => ucfirst(request('firstname')),
                'surname' => ucfirst(request('surname'))
                
            ]
        );
        
        $request->session()->flash('status', 'New Mentor '. request('firstname').' '.request('surname').' Added');
        return redirect('/admin/mentors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function show(Mentor $mentor)
    {
        // $mentors = Mentor::all();

        $mentors = DB::table('mentors')->paginate(10);

        return view('/admin/allMentors', compact('mentors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function edit(Mentor $mentor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */

    public function showMentor(Request $request)
    {
        $id = request('mentor_id');

        $mentors = Mentor::find($id);

        return view('admin/editMentor', compact('mentors'));
    }


    public function update(Request $request, Mentor $mentor)
    {
        $request->validate([
            'id' => 'required|int|',
            'firstname' => 'required|string|max:30',
            'surname' => 'required|string|max:30'
            ]);

        $mentors = DB::table('mentors')
        ->where('id', request('id'))
        ->update(
            [   
                'firstname' => ucfirst(request('firstname')),
                'surname' => ucfirst(request('surname'))
            ]
        );

        $request->session()->flash('status', 'Mentor '. request('firstname'). ' ' .request('surname').' Has Been Updated');
        return redirect('/admin/mentors');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'mentor_id' => 'required|int',
        ]);

        // $booking = Booking::find(request('booking_id'));

        $booking = Mentor::where('id', request('mentor_id'))->delete();

        $request->session()->flash('status', 'Mentor Has Been Deleted');
        return redirect('/admin/mentors');
    }
}
