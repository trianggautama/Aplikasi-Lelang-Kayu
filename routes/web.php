<?php   

Route::get('/', function () {
    return view('welcome');
});

//halaman admin
Route::get('/halaman_admin','adminController@index' )->name('admin_index');
// halaman admin

//data karyawan
Route::get('/karyawan','adminController@karyawan_index' )->name('karyawan_index');
Route::get('/karyawan_detail','adminController@karyawan_detail' )->name('karyawan_detail');
Route::get('/karyawan_edit','adminController@karyawan_edit' )->name('karyawan_edit');


//data karyawan

//data kayu
Route::get('/kayu','adminController@kayu_index' )->name('kayu_index');
Route::post('/kayu','adminController@kayu_tambah' )->name('kayu_tambah');
Route::get('/kayu_edit','adminController@kayu_edit' )->name('kayu_edit');

//data kayu

//data peserta lelang
Route::get('/peserta_lelang','lelangController@peserta_lelang_index' )->name('peserta_lelang_index');
//data peserta lelang

//data  lelang

Route::get('/lelang','lelangController@lelang_index' )->name('lelang_index');

//data  lelang
