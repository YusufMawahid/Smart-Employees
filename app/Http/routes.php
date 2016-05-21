<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
	/* Mainnya*/
	Route::get('home','PegawaiController@home');

	Route::get('admin','PegawaiController@admin');
	
	Route::get('/', 'HomeController@index');
	
	Route::get('login','Auth\AuthController@getLogin');
	
	Route::post('login','Auth\AuthController@postLogin');
	
	Route::get('logout','Auth\AuthController@getLogout');


	/*USER*/
	Route::get('absenuser','UserController@absenuser');
	Route::get('pendingabsen','UserController@pendingabsen');
	/*END USER*/

	/*ADMIN*/
	

	Route::get('tambahkerja','AdminController@view_tambahkerja');
	Route::get('pekerjaan','AdminController@view_kerja');
	Route::post('postkerja','AdminController@add_tambahkerja');
	Route::get('deletepeker/{id}','AdminController@deletepeker');
	Route::get('reportjob','AdminController@view_reportjob');

	Route::get('tambahkaryawan','AdminController@view_tambahkar');
	Route::post('postkaryawan','AdminController@add_karyawan');
	Route::get('karyawan','AdminController@view_karyawan');
	Route::get('karyawan/pekerjaanAsJSON/{id}', 'AdminController@AjaxPekerjaan');
	Route::get('karyawan/divisiAsJSON/{id}', 'AdminController@AjaxDivisi');
	Route::get('deletekaryawan/{id}','AdminController@delete_kar');
	Route::get('detail/{id}','AdminController@detail');



	Route::get('divisi','AdminController@view_divisi');
	Route::get('deletediv/{id}','AdminController@delete_div');
	Route::get('tambahdivisi','AdminController@view_tambahdiv');
	Route::post('postdivisi','AdminController@add_divisi');


	Route::get('adduser','AdminController@view_adduser');
	Route::get('user','AdminController@view_user');
	Route::post('postuser','AdminController@add_user');



	Route::get('/images/{filename}',
    function ($filename)
{
    $path = storage_path() . '/' . $filename;

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
	
	/*Route::get('pdf',function() {
		$pdf = PDF::loadView('admin.pekerjaan.reportjob');
		return $pdf->download('invoice.pdf');
	});*/


	/*<div id="login">
               <h1>Welcome Back!</h1>
               @if (count($errors) > 0)
            <strong>WHOOPS!</strong>there were some problems with your input.<br><br>
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error->first('email') }}</li>
               @endforeach
            </ul>
            @endif*/