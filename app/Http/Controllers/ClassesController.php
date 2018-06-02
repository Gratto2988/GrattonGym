<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Classes;
use App\Mentor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClassesController extends Controller
{
//Auth Middleware ---------------------------------------------------------------------
    public function __construct()
    {
        $this->middleware('auth');
    }

//Index Method----------------------------------------------------------------------------
    public function index()
    {
        $mon = static::mon();
        $tue = static::tue();
        $wed = static::wed();
        $thu = static::thu();
        $fri = static::fri();
        $sat = static::sat();
        $sun = static::sun();
        
        $total = new ClassesController();
        $user = Auth::id();
        

        return view('bookingclass', compact('mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun', 'total', 'user'));
    }

//show Method
    public function show()
    {
        $classes = DB::table('classes')->paginate(15);

        return view('admin/allClasses', compact('classes'));
    }

    public function showClass(Request $request)
    {
        $id = request('class_id');

        $classes = Classes::find($id);

        $mentors = Mentor::All();

        return view('admin/editClass', compact('classes','mentors'));
    }

//Monday Classes -------------------------------------------------------------------------------
    public function mon()
    {
        $monClasses = Classes::where('day', 'Mon')->get(); 

        return $monClasses;
    }
//Tuesday Classes -----------------------------------------------------------------------------
    public function tue()
    {
        $tueClasses = Classes::where('day', 'Tue')->get(); 

        return $tueClasses;
    }
//Wednesday Classes ----------------------------------------------------------------------------
    public function wed()
    {
        $wedClasses = Classes::where('day', 'wed')->get(); 

        return $wedClasses;
    }
//Thursday Classes -----------------------------------------------------------------------------     
    public function thu()
    {
        $thuClasses = Classes::where('day', 'thu')->get(); 

        return $thuClasses;
    }
//Friday Classes ------------------------------------------------------------------------------     
    public function fri()
    {
        $friClasses = Classes::where('day', 'fri')->get(); 

        return $friClasses;
    }
//Saturday Classes ---------------------------------------------------------------------------     
    public function sat()
    {
        $satClasses = Classes::where('day', 'sat')->get(); 

        return $satClasses;
    }
//Sunday Classes -----------------------------------------------------------------------------    
    public function sun()
    {
        $sunClasses = Classes::where('day', 'sun')->get(); 

        return $sunClasses;
    }
    
//Total of places available for booking in a class

    public function total($id)
    {
        $classes = Classes::find($id);

        $bookingAmount = Booking::all()->where("class_id", $id)->count();

        $total = $classes["total"] - $bookingAmount;

        return $total;
    }

    public function alreadyBooked($id)
    {
        $classes = Classes::find($id);

        $user = Auth::id();

        $alreadybooked = Booking::where([ ['user_id', $user],['class_id', $id] ])->count();
        
        return $alreadybooked;

    }   
    
//=====================================================================================
    public function showAddClass(){

        $mentors = Mentor::All();

        return view('admin/addClass', compact('mentors'));

    }

//Store Class --------------------------------------------------------------------------
    public function store(Request $request)
    {
        
        $request->validate([
                'class' => 'required|string|max:25',
                'day' => 'required|string|max:25',
                'duration' => 'required|int' ,
                'time' => 'required|string|max:25',
                'mentor_id' => 'required|int',
                'total' => 'required|int' 
                
            ]);

        $classes = DB::table('classes')->insert(
            [   
                'class' => ucwords(request('class')),
                'day' => ucfirst(request('day')), 
                'time' => request('time'),
                'duration' => request('duration'),
                'mentor_id' => request('mentor_id'),
                'total' => request('total')
                
            ]
        );
        
        $request->session()->flash('status', 'New Class '. request('class').' Added');
        return redirect('/admin/classes');
    }

//=============================================================================================

//Search Class---------------------------------------------------------------------------
    public function searchClass(Request $request)
    {
            $request->validate([
                'search' => 'required|string|max:25', 
            ]);

        $classes = DB::table('classes')
                        ->where('class', 'like', '%' . request('search') . '%')
                        ->paginate(15);
        
        return view('admin/allClasses', compact('classes'));
    }

//edit
    public function edit($id)
    {
        //
    }

//update
    public function update(Request $request)
    {
        $request->validate([
                'id' => 'required|int|',
                'class' => 'required|string|max:25',
                'day' => 'required|string|max:25',
                'duration' => 'required|int' ,
                'time' => 'required|string|max:25',
                'mentor_id' => 'required|int',
                'total' => 'required|int' 
                
            ]);

        $classes = DB::table('classes')
        ->where('id', request('id'))
        ->update(
            [   
                'class' => ucwords(request('class')),
                'day' => ucfirst(request('day')), 
                'time' => request('time'),
                'duration' => request('duration'),
                'mentor_id' => request('mentor_id'),
                'total' => request('total')
                
            ]
        );

        $request->session()->flash('status', 'Class '. request('class').' on '.ucfirst(request('day')).' Has Been Updated');
        return redirect('/admin/classes');
    }

//destroy
    public function destroy(Request $request, Classes $classes)
    {
        $request->validate([
                'class_id' => 'required|int',
            ]);

        $class = Classes::where('id', request('class_id'))->delete();

        $request->session()->flash('status', 'Class Has Been Deleted');
        return redirect('/admin/');
    }

}
