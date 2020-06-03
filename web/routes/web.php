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

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', 'DashboardController@index')->name('dashboard');

    // user
    Route::resource('user', 'UserController');
    Route::post('user/{id}/reset_password', 'UserController@reset_password')->name('user.reset_password');

    // sensory test
    Route::prefix('sensory')->group(function () {
        // test information
        Route::get('test-info/create', 'TestInfoController@edit')->name('test-info.create');
        Route::post('test-info/store', 'TestInfoController@store')->name('test-info.store');
        Route::get('test-info/edit', 'TestInfoController@edit')->name('test-info.edit');

        Route::resource('pretest', 'PretestController');
        Route::resource('test-question', 'TestQuestionController');
    });
});


// datatables
Route::group(['prefix' => 'datatables', 'middleware' => 'auth'], function () {
    Route::resource('users', 'DataTables\UserController');
});
