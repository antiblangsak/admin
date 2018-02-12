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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('family_registration', 'FamilyRegistrationController');

Route::get('images/{filename}', function ($filename)
{
//    $file = Storage::disk('public')->get($filename);

//    echo $file;
    $file = 'storage/app/public/' . $filename;
    return view('image_viewer', [
        'file_name' => $filename,
        'file_path' => $file
    ]);

})->name('image');