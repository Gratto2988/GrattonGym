<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home2');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/2', function () {
//     return view('home2');
// });
Route::get('/home/details', 'DetailsController@index');

//---------------------------------------------------------------------------------------------------------

//Book Class ----------------------------------------------------
Route::get('/home/bookclass', 'ClassesController@index');
Route::post('/home/booked', 'BookingController@store');

//---------------------------------------------------------------------------------------------------------

//Booking Delete -------------------------------------------------
Route::post('/home/delete', 'BookingController@destroy');

//---------------------------------------------------------------------------------------------------------

//Edit and Update User Deatails-----------------------------------
Route::get('/home/editname', 'DetailsController@editName');
Route::get('/home/editemail', 'DetailsController@editEmail');
Route::get('/home/editpassword', 'DetailsController@editPassword');

Route::post('/home/updatename', 'DetailsController@updateName');
Route::post('/home/updateemail', 'DetailsController@updateEmail');
Route::post('/home/updatepassword', 'DetailsController@updatePassword');
//End of Edit and update -----------------------------------------

//=========================================================================================================

//Admin Users Area ----------------------------------------------------------------------------------------------
Route::get('/admin', 'UsersController@index');
Route::get('/admin/users', 'UsersController@show');
Route::get('/admin/adduser', 'UsersController@register');
Route::post('/admin/createuser', 'UsersController@create');
Route::post('/admin/deleteuser', 'UsersController@destroy');
Route::post('/admin/edituser', 'UsersController@edit');
Route::post('/admin/updatename', 'UsersController@updateName');
Route::post('/admin/updateemail', 'UsersController@updateEmail');
Route::post('/admin/updatepassword', 'UsersController@updatePassword');

//Admin Classes Area---------------------------------------------------------------------------------------
Route::get('/admin/classes', 'ClassesController@show');
Route::get('/admin/addclass', 'ClassesController@showAddClass');
Route::post('/admin/addedclass', 'ClassesController@store');
Route::post('/admin/deleteclass', 'ClassesController@destroy');
Route::post('/admin/editclass', 'ClassesController@showClass');
Route::post('/admin/updateclass', 'ClassesController@update');

//Admin Mentor Area----------------------------------------------------------------------------------------
Route::get('/admin/mentors', 'MentorController@show');
Route::get('/admin/addmentor', 'MentorController@index');
Route::post('/admin/deletementor', 'MentorController@destroy');
Route::post('/admin/addedmentor', 'MentorController@store');
Route::post('/admin/editmentor', 'MentorController@showMentor');
Route::post('/admin/updatementor', 'MentorController@update');

//Searches-------------------------------------------------------------------------------------------------
Route::post('/admin/searchuser', 'UsersController@searchUser');
Route::post('/admin/searchclass', 'ClassesController@searchClass');
Route::post('/admin/searchmentor', 'MentorController@searchMentor');
//Email----------------------------------------------------------------------------------------------------
route::post('/email', 'indexController@sendEmail');

