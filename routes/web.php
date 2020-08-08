<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function() {

        //Dashboard
        Route::get('/', 'Dashboard\DashboardController@index');

        //Records
        Route::get('/records/add', 'Record\RecordController@preAdd');
        Route::post('/records/add', 'Record\RecordController@addRecord');
        Route::post('/records/delete', 'Record\RecordController@delete');
        Route::get('/records/detail/{id}', 'Record\RecordController@details');
        Route::get('/records/update/{id}', 'Record\RecordController@preUpdate');
        Route::post('/records/update', 'Record\RecordController@update');

        //auth
        Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

    });
});