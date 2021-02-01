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

// Route::get('/', function () {
//     return view('home');
// });


//Login
Route::get('/', 'AuthController@login')->name('login');


Route::get('/login','AuthController@login')->name('login');
Route::post('postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');


//Master Rekening Bank
Route::group(['middleware' => ['auth','checkRole:admin,bendahara']],function(){
	Route::get('/daftbank','DaftbankController@index');
	Route::post('/daftbank/create','DaftbankController@create');
	Route::get('/daftbank/{id}/edit','DaftbankController@edit');
	Route::post('/daftbank/{id}/update','DaftbankController@update');
	Route::get('/daftbank/{id}/delete','DaftbankController@delete');
	Route::get('/daftbank/export','DaftbankController@export');
	Route::get('/daftbank/exportpdf','DaftbankController@exportpdf');

	//Manajemen User
	Route::get('/muser','MuserController@index');
	Route::post('/muser/create','MuserController@create');
	Route::get('/muser/{id}/edit','MuserController@edit');
	Route::post('/muser/{id}/update','MuserController@update');
	Route::get('/muser/{id}/delete','MuserController@delete');

	//Master Akun penerimaan
	Route::get('/matangd','MatangdController@index');
	Route::post('/matangd/create','MatangdController@create');
	Route::match(['get','post'],'/matangd/{id}/edit','MatangdController@edit');
	Route::get('/matangd/{id}/delete','MatangdController@delete');

	//Transaksi Penerimaan
	Route::get('/penerimaan','PenerimaanController@index');
	Route::get('/penerimaan/create','PenerimaanController@create');
	Route::get('/penerimaan/cek-nomor','PenerimaanController@cek_nomor_penerimaan');
	Route::post('/penerimaan/insertdata','PenerimaanController@insertdata');
	Route::get('/penerimaan/{id}/edit','PenerimaanController@edit');
	Route::delete('/penerimaan/{id}/deletechild','PenerimaanController@deletechild');
	Route::post('/penerimaan/{id}/updateinsert','PenerimaanController@updateinsert');
	Route::get('/penerimaan/{id}/hapusall','PenerimaanController@hapusall');
	Route::get('penerimaan/cetakpenerimaanform','PenerimaanController@cetakform');
	Route::post('/penerimaan/exportpdf','PenerimaanController@exportpdf');
	Route::post('/penerimaan/exportrincipdf','PenerimaanController@exportrincipdf');

	//Transaksi Pergeseran
	Route::get('/pergeseran','PergeseranController@index');
	Route::post('/pergeseran/create','PergeseranController@create');
	Route::get('/pergeseran/{id}/delete','PergeseranController@delete');
	Route::post('/pergeseran/{id}/edit','PergeseranController@edit');
	
	
	//Master Akun Pengeluaran
	Route::get('/matangr','MatangrController@index');
	Route::post('/matangr/create','MatangrController@create');
	Route::match(['get','post'],'/matangr/{id}/edit','MatangrController@edit');
	Route::get('/matangr/{id}/delete','MatangrController@delete');



	//Transaksi Pengeluaran
	Route::get('/pengeluaran','PengeluaranController@index');
	Route::get('/pengeluaran/create','PengeluaranController@create');
	Route::get('/pengeluaran/cek-nomor','PengeluaranController@cek_nomor');
	Route::post('/pengeluaran/validasi-tambah','PengeluaranController@cek_validasi_tambah');
	Route::post('/pengeluaran/insertdata','PengeluaranController@insertdata');
	Route::get('/pengeluaran/{id}/hapusall','PengeluaranController@hapusall');
	Route::post('/pengeluaran/creategeser','PengeluaranController@creategeser');

	//Cetak LAPKEU
	Route::get('/laporan','LaporanController@index');
	Route::post('/laporan/perubahandanaexportpdf','LaporanController@perubahandanaexportpdf');

	//Cetak LAPKEU
	Route::get('/bku','BkuController@index');
	Route::post('/bku/bkuexportpdf','BkuController@bkuexportpdf');
	Route::post('/bku/bkuakunexportpdf','BkuController@bkuakunexportpdf');
});

Route::group(['middleware' => ['auth','checkRole:admin,bendahara,pimpinan']],function(){
	//Dashboar
	Route::get('/dashboard','DashboardController@index');
});