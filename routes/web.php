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
->name('karyawan_index');
Route::get('/karyawan/tambah','adminController@karyawan_tambah')
->name('karyawan_tambah');
Route::POST('/karyawan/tambah','adminController@karyawan_tambah_store')
->name('karyawan_tambah_store');
Route::get('/karyawan/detail/{id}','adminController@karyawan_detail')
->name('karyawan_detail');
Route::get('/karyawan/edit/{id}','adminController@karyawan_edit')
->name('karyawan_edit');
// Route::get('/karyawan_edit/{id}/edit', 'AdminController@karyawan_edit')->name('karyawan_edit');
Route::POST('/admin/datamahasiswa/{id}/edit', 'AdminController@storeeditDataMahasiswa');


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
});

Auth::routes();

Route::get('/home', 'dashboardController@index')->name('home');
