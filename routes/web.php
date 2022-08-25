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

// Route::get('/', function () {
//     return view('landing-page.index');
// });

// Route::group(['middleware' => ['role:user ']], function () {

Route::get('/', 'HomeController@index')->name('home');

Route::get('/reset_password/{token}', 'Auth\ResetPasswordController@reset_password')->name('reset_password');
Route::post('reset_password_post', 'Auth\ResetPasswordController@reset_password_post')->name('reset_password_post');
Route::post('lupa-password', 'ForgotPasswordController@forgot_store')->name('lupa-password');

Auth::routes();

Route::get('konfirmasi-email/{email}/{register_token}','User\VeriifikasiEmailController@konfirmasi_email')->name('konfirmasi-email');
Route::get('kirim-verifikasi','User\VeriifikasiEmailController@verifikasi_email')->name('kirim-verifikasi');
Route::get('ganti-password','User\ChangePasswordController@ganti_password_form')->name('ganti-password');
Route::get('dashboard-ganti-password','User\ChangePasswordController@dashboard_ganti_password_form')->name('dashboard-ganti-password');
Route::post('ganti-password','User\ChangePasswordController@ganti_password')->name('ganti-password');







  Route::get('list-masjid', 'User\ListMasjidController@index')->name('list-masjid');
  Route::get('list-kajian', 'User\ListKajianController@index')->name('list-kajian');
  Route::get('detail-masjid/{id}', 'User\ListMasjidController@detail')->name('detail-masjid');
  Route::get('detail-kajian/{id}', 'User\ListKajianController@detail')->name('detail-kajian');



  // Route::get('self-assessment', 'User\SelfAssessmentController@index')->name('self-assessment');
  // Route::post('self-assessment/count', 'User\SelfAssessmentController@count')->name('self-assessment/count');

Route::get('user','UserController@index')->name('user');
Route::get('profil-user','UserController@profil')->name('profil-user');


Route::get('daftar-kajian/{id}','PendaftaranKajianController@daftar')->name('daftar-kajian');
Route::get('detail-pendaftaran/{id}','PendaftaranKajianController@index')->name('detail-pendaftaran');

// });
// Route::get('multiuser','MultiUserController@index')->name('multiuser');

Route::group(['middleware' => ['role:superadmin']], function () {
    Route::get('user','UserController@index')->name('user');
    Route::get('user/edit/{id}','UserController@edit')->name('user/edit');
    Route::post('user/update/{id}','UserController@update')->name('user/update');
    Route::post('user/destroy','UserController@destroy')->name('user/destroy');

    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('table-masjid','MasjidController@index')->name('table-masjid');
    Route::get('masjid/detail/{id}','MasjidController@detail')->name('detail/masjid');
    Route::get('masjid/create', 'MasjidController@create')->name('masjid/create');
    Route::post('masjid/store', 'MasjidController@store')->name('masjid/store');
    Route::get('masjid/edit/{id}', 'MasjidController@edit')->name('masjid/edit');
    Route::post('masjid/update/{id}', 'MasjidController@update')->name('masjid/update');
    Route::post('masjid/destroy', 'MasjidController@destroy')->name('masjid/destroy');

    Route::get('verifikasi_user', 'VerifikasiUserController@index')->name('verifikasi_user');
    // Route::get('verifikasi_user/details/{id}', 'VerifikasiUserController@details')->name('verifikasi_user/details');
    Route::post('verifikasi_user/update/{id}', 'VerifikasiUserController@update')->name('verifikasi_user/update');
    Route::post('pendaftar-info','VerifikasiUserController@info_pendaftar')->name('pendaftar-info');

    Route::get('pengelola/{id}', 'PengelolaController@index')->name('pengelola');
    Route::get('tambah_pengelola/{masjid_id}', 'PengelolaController@create')->name('tambah_pengelola');
    Route::post('store_pengelola', 'PengelolaController@store')->name('store_pengelola');
    Route::get('pengelola/edit/{id}', 'PengelolaController@edit')->name('pengelola/edit');
    Route::post('pengelola/update/{id}', 'PengelolaController@Update')->name('pengelola/update');
    Route::post('pengelola/destroy', 'PengelolaController@destroy')->name('pengelola/destroy');


    Route::get('slider', 'SliderController@index')->name('slider');
    Route::get('tambah/slider', 'SliderController@create')->name('tambah/slider');
    Route::post('tambah/slider', 'SliderController@store')->name('tambah/slider');
    Route::get('edit/slider/{id}', 'SliderController@edit')->name('edit/slider');
    Route::post('edit/slider/{id}', 'SliderController@update')->name('edit/slider');
    Route::post('slider/hapus', 'SliderController@destroy')->name('slider/hapus');


    Route::post('user/suspend', 'SanksiController@create')->name('user/suspend');
    Route::post('user/aktifkan', 'SanksiController@destroy')->name('user/aktifkan');
});




Route::group(['middleware' => ['role:admin|superadmin']], function () {
    Route::get('masjid','MasjidController@index')->name('masjid');
    Route::get('masjid/detail/{id}','MasjidController@detail')->name('masjid/detail');
    Route::get('kajian/detail/{id}','KajianController@detail')->name('kajian/detail');

    Route::get('kajian/create/{id}','KajianController@create')->name('kajian/create');
    Route::post('kajian/store','KajianController@store')->name('kajian/store');

    Route::get('kajian/create/{id}','KajianController@create')->name('kajian/create');
    Route::post('kajian/store','KajianController@store')->name('kajian/store');
    Route::get('kajian/edit/{id}','KajianController@edit')->name('kajian/edit');
    Route::post('kajian/update/{id}','KajianController@update')->name('kajian/update');
    Route::post('kajian/destroy','KajianController@destroy')->name('kajian/destroy');
    Route::get('kajian/detail/ikhwan/{id}','KajianController@detail_ikhwan')->name('kajian/detail/ikhwan');
    Route::get('kajian/detail/akhwat/{id}','KajianController@detail_akhwat')->name('kajian/detail/akhwat');
    Route::post('kajian-info','KajianController@info_kajian')->name('kajian-info');

    Route::get('barcode-scanner/{kajian_id}','BarcodeScannerController@index')->name('barcode-scanner');
    Route::post('live-search-pendaftar', 'BarcodeScannerController@cari')->name('live-search-pendaftar');
    Route::post('verifikasi-pendaftar', 'BarcodeScannerController@verifikasi')->name('verifikasi-pendaftar');


});
