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
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('admin', function () {
    return view('admin_template');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/calender', 'HomeController@calender')->name('home.calender');
Route::get('event/add','EventController@createEvent');
Route::post('event/add','EventController@store');
Route::get('event','EventController@calender');
Route::get('roles/yjraindex','RoleController@yjraindex')->name('roles.yjraindex');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
    
});

Route::prefix('patient')->group(function () {
   Route::get('show','PatientController@show')->name('patient.show');
   Route::get('create','PatientController@create')->name('patient.create');
   Route::post('store','PatientController@store')->name('patient.store');
});

Route::prefix('billing')->group(function () {
   Route::any('show','BillingController@show')->name('billing.show');
   Route::get('create','BillingController@create')->name('billing.create');
   Route::post('store','BillingController@store')->name('billing.store');
   Route::get('edit/{id}','BillingController@edit')->name('billing.edit');
});

Route::prefix('medician')->group(function () {
   Route::get('show','MedicianController@show')->name('medician.show');
});



Route::resource('producttest','ProducttestController');
//Route::get('event','EventController@calender');
Route::get('users1/yjraindex','UserController@index')->name('users.yjraindex');
Route::get('/users1/data-table', 'UserController@getUsersForDataTable')->name('users.table');


Route::get('users1/indexvue','UserController@indexvue')->name('users.indexvue');
Route::get('users1/indexvue1','UserController@indexvue1')->name('users.indexvue1');