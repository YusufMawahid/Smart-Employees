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
	Route::get('index', 'HomeController@index_user');

	Route::get('login','Auth\AuthController@getLogin');

	Route::post('login','Auth\AuthController@postLogin');

	Route::get('home_user','UserController@dashboard');

	Route::get('register','Auth\AuthController@getRegister');

	Route::post('register','Auth\AuthController@postRegister');

	Route::get('logout','Auth\AuthController@getLogout');


	/*USER*/
	Route::get('divisi_user','UserController@view_divisi');
	Route::get('karyawan_user','UserController@view_karyawan');
	Route::get('pekerjaan_user','UserController@view_pekerjaan');
	Route::get('user/video','UserController@video');
	Route::get('payroll_user','UserController@payroll');

	Route::get('messages','ChatController@index');
	Route::post('messages','ChatController@sendMessage');
	Route::get('messages/{id}','ChatController@userMessage');
	Route::get('api/messages/{id}','ChatController@reloadMessage');

	/*END USER*/

	/*404 page not found*/
	Route::get('errorpage','HomeController@errorpage');
	/*THE END*/

	/*ADMIN*/

	Route::get('dashboard','AdminController@dashboard');


	Route::get('tambahkerja','AdminController@view_tambahkerja');
	Route::get('pekerjaan','AdminController@view_kerja');
	Route::post('postkerja','AdminController@add_tambahkerja');
	Route::get('deletepeker/{id}','AdminController@deletepeker');
	Route::get('reportjob/{id}','AdminController@view_reportjob');

	Route::get('tambahkaryawan','AdminController@view_tambahkar');
	Route::post('postkaryawan','AdminController@add_karyawan');
	Route::get('karyawan','AdminController@view_karyawan');
	Route::get('karyawan/pekerjaanAsJSON/{id}', 'AdminController@AjaxPekerjaan');
	Route::get('karyawan/divisiAsJSON/{id}', 'AdminController@AjaxDivisi');
	Route::get('deletekaryawan/{id}','AdminController@delete_kar');
	Route::get('detail/{id}','AdminController@detail');
	Route::get('karyawan/edit/{id}','AdminController@viewedit_karyawan');
	Route::post('posteditkaryawan/{id}','AdminController@edit_karyawan');



	Route::get('divisi','AdminController@view_divisi');
	Route::get('deletediv/{id}','AdminController@delete_div');
	Route::get('tambahdivisi','AdminController@view_tambahdiv');
	Route::post('postdivisi','AdminController@add_divisi');


	Route::get('adduser','AdminController@view_adduser');
	Route::get('user','AdminController@view_user');
	Route::get('deleteuser/{id}','AdminController@delete_user');
	Route::post('postuser','AdminController@add_user');


	Route::get('admin/addAdmin','AdminController@view_addAdmin');
	Route::post('admin/postadmin','AdminController@post_admin');
	Route::get('dataAdmin','AdminController@data_admin');
	Route::get('admin/delete/{id}','AdminController@delete_admin');
	Route::get('admin/detail/{id}','AdminController@detail_admin');
	Route::get('admin/edit/{id}','AdminController@view_edit_admin');
	Route::post('adminpostedit/{id}','AdminController@post_edit_admin');



	Route::get('payroll','AdminController@payroll');

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
