<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class DetailsController extends Controller
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

//-------------------------------------------------------------------

    public function index()
    {
        $user = static::show();

        session()->flash('details', 'Edit Your Account Details Here!');

        return view('accountdetails', ['user' => $user]);
    }

//-------------------------------------------------------------------

    public function show()
    {
        $id = Auth::id();

        $user = User::find($id)->toArray();

        return $user;
    }

//-------------------------------------------------------------------
    
    public function editName()
    {
        $user = static::show();

        return view('updateName', ['user' => $user]);
    }

//-------------------------------------------------------------------

    public function editEmail()
    {
        $user = static::show();

        return view('updateEmail', ['user' => $user]);
    }

//-------------------------------------------------------------------

    public function editPassword()
    {
        $user = static::show();

        return view('updatePassword', ['user' => $user]);
    }

//-------------------------------------------------------------------

    public function updateName(Request $request)
    {

        $request->validate([
                'firstname' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
            ]);

        $id = Auth::id();

        $update = DB::table('users')
            ->where('id', $id)
            ->update(
                [
                'firstname' => ucfirst(request('firstname')),
                'surname' => ucfirst(request('surname'))
                ]

            );

        

        return redirect('/home/details');
    }
//-------------------------------------------------------------------

    public function updateEmail(Request $request)
    {
        $request->validate([

                'email' => 'required|string|email|max:255|unique:users'

            ]);

        $id = Auth::id();

        $update = DB::table('users')
            ->where('id', $id)
            ->update(
                [
                'email' => request('email')
                ]

            );

        return redirect('/home/details');
    }

//-------------------------------------------------------------------
    
    public function updatePassword(Request $request)
    {
        $request->validate([

                'password' => 'required|string|min:6|confirmed',

            ]);

        $id = Auth::id();

        $update = DB::table('users')
            ->where('id', $id)
            ->update(
                [
                'password' => bcrypt($request['password'])
                ]

            );

        return redirect('/home/details');
    }
}
