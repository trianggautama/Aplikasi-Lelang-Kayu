<?php

Route::get('/', function () {
    return view('welcome');
});

//halaman admin
Route::group(['middleware' => 'admin'], function() {
    Route::get('/halaman_admin','adminController@index' )->name('admin_index');

// halaman admin
//data karyawan
Route::get('/karyawan','adminController@karyawan_index' )
->name('karyawan-index');
Route::get('/karyawan/tambah','adminController@karyawan_tambah')
->name('karyawan-tambah');
Route::POST('/karyawan/tambah','adminController@karyawan_tambah_store')
->name('karyawan-tambah_store');
Route::get('/karyawan/detail/{id}','adminController@karyawan_detail')
->name('karyawan-detail');
Route::get('/karyawan/edit/{id}','adminController@karyawan_edit')
->name('karyawan-edit');
Route::put('/karyawan/edit/{id}','adminController@karyawan_update')
->name('karyawan-update');
// Route::get('/karyawan_edit/{id}/edit', 'AdminController@karyawan_edit')->name('karyawan_edit');
Route::POST('/admin/datamahasiswa/{id}/edit', 'AdminController@storeeditDataMahasiswa');


//data karyawan

//data kayu
Route::get('/kayu','adminController@kayu_index' )->name('kayu-index');
Route::post('/kayu','adminController@kayu_tambah' )->name('kayu-tambah');
Route::get('/kayu_edit','adminController@kayu_edit' )->name('kayu-edit');

//data kayu

//data peserta lelang
Route::get('/peserta_lelang','lelangController@peserta_lelang_index' )->name('peserta-lelang-index');
//data peserta lelang

//data  lelang

Route::get('/lelang','lelangController@lelang_index' )->name('lelang-index');

//data  lelang

//Berita
Route::get('/berita','adminController@Berita_index' )->name('berita-index');
Route::get('/berita_tambah','adminController@Berita_tambah' )->name('berita-tambah');
});


//halaman peserta
Route::get('/halaman_user','pesertaController@index' )->name('peserta-index');
Route::get('/lelang_berlangsung','pesertaController@lelang_berlangsung' )->name('lelang-berlangsung');

Auth::routes();

Route::get('/home', 'dashboardController@index')->name('home');

