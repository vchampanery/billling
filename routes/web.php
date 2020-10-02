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

//check user login before controller and action..

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
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

    Route::prefix('module')->group(function () {
       Route::any('show','ModuleController@show')->name('module.show');
       Route::get('create','ModuleController@create')->name('module.create');
       Route::post('store','ModuleController@store')->name('module.store');
       Route::get('edit/{id}','ModuleController@edit')->name('module.edit');
    });
    Route::prefix('field')->group(function () {
       Route::any('show','FieldController@show')->name('field.show');
       Route::get('create','FieldController@create')->name('field.create');
       Route::post('store','FieldController@store')->name('field.store');
       Route::get('edit/{id}','FieldController@edit')->name('field.edit');
    });
    Route::prefix('software')->group(function () {
       Route::any('show','SoftwareController@show')->name('software.show');
       Route::get('create','SoftwareController@create')->name('software.create');
       Route::post('store','SoftwareController@store')->name('software.store');
       Route::get('edit/{id}','FieldController@edit')->name('software.edit');
    });
    Route::prefix('user')->group(function () {
       Route::any('dashboard','UserDashboardController@show')->name('userdashboard.show');
    });

    Route::prefix('client')->group(function () {
       Route::any('dashboard','ClientDashboardController@show')->name('clientdashboard.show');
       Route::any('edit/{id}/{date}','ClientDashboardController@edit')->name('clientdashboard.edit');
       Route::any('add','ClientDashboardController@create')->name('clientdashboard.add');
       Route::post('store','ClientDashboardController@store')->name('clientdashboard.store');
       Route::any('generateentry','ClientDashboardController@generateentry')->name('clientdashboard.generateentry');
       Route::any('downloadexcel','ClientDashboardController@downloadExcel')->name('clientdashboard.downloadexcel');
    });

    Route::prefix('clientmaster')->group(function () {
       Route::any('show','ClientController@show')->name('client.show');
       Route::any('edit/{id}','ClientController@edit')->name('client.edit');
       Route::any('create','ClientController@create')->name('client.create');
       Route::post('store','ClientController@store')->name('client.store');
       Route::any('checkintegration','ClientController@checkIntegration')->name('client.checkintegration');
    });

    
    
    Route::prefix('userassign')->group(function () {
       Route::any('show','UserAssignController@show')->name('userassign.show');
       Route::any('edit/{id}','UserAssignController@edit')->name('userassign.edit');
       Route::any('create','UserAssignController@create')->name('userassign.create');
       Route::post('store','UserAssignController@store')->name('userassign.store');
       Route::any('reassign','UserAssignController@reassign')->name('userassign.reassign');
       Route::any('getclient','UserAssignController@getclient')->name('userassign.getclient');
       Route::any('reassignstore','UserAssignController@reassignstore')->name('userassign.reassignstore');
    });
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