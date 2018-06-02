<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {

        return view('admin/admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function register()
    {
        return view('admin/register');
    }

    protected function create(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', 
            ]);
        
        User::create([
            'firstname' => ucfirst(request('firstname')),
            'surname' => ucfirst(request('surname')),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        $request->session()->flash('status', 'New User '. request('firstname').' '.request('surname').' Added');
        return redirect('/admin/users');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function searchUser(Request $request)
    {
            $request->validate([
                'search' => 'required|string|max:25', 
            ]);
// SELECT * FROM Customers
// WHERE CustomerName LIKE 'a%';
        $users = DB::table('users')
                        ->where('firstname', 'like', '%' . request('search') . '%')
                        ->orWhere('surname', 'like', '%' . request('search') . '%')
                        ->paginate(10);

        
        return view('admin/allUsers', compact('users'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = DB::table('users')->paginate(10);

        return view('admin/allUsers', compact('users'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = request('user_id');

        $user = User::find($id);

        return view('admin/editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateName(Request $request)
    {

        $request->validate([
                'firstname' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
            ]);

        

        $update = DB::table('users')
            ->where('id', request('id'))
            ->update(
                [
                'firstname' => ucfirst(request('firstname')),
                'surname' => ucfirst(request('surname'))
                ]

            );
        $request->session()->flash('status', 'User '. request('firstname') .' '. request('surname') .' Updated');
        return redirect('/admin/users');
    }
//-------------------------------------------------------------------

    public function updateEmail(Request $request)
    {
        $request->validate([

                'email' => 'required|string|email|max:255|unique:users'

            ]);

        

        $update = DB::table('users')
            ->where('id', request('id'))
            ->update(
                [
                'email' => request('email')
                ]

            );

        $request->session()->flash('status', 'User Email Updated to '. request('email'));
        return redirect('/admin/users');
    }

//-------------------------------------------------------------------
    
    public function updatePassword(Request $request)
    {
        $request->validate([

                'password' => 'required|string|min:6|confirmed',

            ]);

        

        $update = DB::table('users')
            ->where('id', request('id'))
            ->update(
                [
                'password' => bcrypt($request['password'])
                ]

            );

        $request->session()->flash('status', 'User Password Updated');
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'user_id' => 'required|int',

        ]);

        $user = User::where('id', request('user_id'))->delete();

        $request->session()->flash('status', 'User Has Been Deleted');
        return redirect('/admin/users');
    }
}
