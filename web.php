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
Route::get('/reg','FirstController@reg');
Route::post('/regcode',array('uses'=>'FirstController@regcode'));
Route::get('/login','FirstController@login');
Route::post('/logincode',array('uses'=>'FirstController@logincode'));

Route::get('/post', 'PostController@index');
Route::get('/edituser', 'PostController@edituser');
Route::post('/updateuser', 'PostController@updateuser');
Route::get('/deleteuser', 'PostController@deleteuser');
Route::get('/logout','PostController@logout');
Route::get('/first','FirstController@index');
Route::get('/siload','FirstController@siload');
//Route::post('/si','FirstController@si')->name('si');
Route::post('/si',array('uses'=>'FirstController@si'));
Route::get('/second','FirstController@second');
Route::get('/second/{a}/{b}', 'FirstController@display');
Route::resource('first','FirstController',['only'=> ['create','show']]);
Route::get('checkuid/{uid}', function () {
    return view('index');
})->middleware('checkid');

Route::get('/home', function () {
  return view('index');
});
Route::get('/blog', function () {
  return view('blog');
});

Route::get('/contact', function () {
  return view('contact');
});
Route::get('/portfolio', function () {
  return view('portfolio');
});


Route::get('/scs', function () {
  return Redirect('https://shivaconceptsolution.com');
});

Route::redirect('concept','https://shivaconceptsolution.com');  