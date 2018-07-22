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
    return view('auth.login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//
//Route::group(['prefix' => '/'], function(){
//
//    Route::get('/', [
//        'uses' => 'SeekerController@index',
//        'as' => 'home-seeker'
//    ]);
//
//});

Route::group(['prefix' => 'emp'], function(){

    Route::get('/', [
        'uses' => 'Pegawai\ActivityController@index',
        'as' => 'home-pegawai'
    ]);

    Route::post('/delete/lamaran', [
        'uses' => 'Pegawai\ActivityController@deletelamaran',
        'as' => 'delete-lamaran'
    ]);

    //Posisi Page COntrol

    Route::get('/posisi', [
        'uses' => 'Pegawai\ActivityController@posisi',
        'as' => 'posisi-pegawai'
    ]);

    Route::post('/posisi/add', [
        'uses' => 'Pegawai\ActivityController@posisiadd',
        'as' => 'posisi-add'
    ]);

    //Account Page Control

    Route::get('/account', [
        'uses' => 'Pegawai\ActivityController@account',
        'as' => 'akun-pegawai'
    ]);

    Route::get('/account/add', [
        'uses' => 'Pegawai\ActivityController@add',
        'as' => 'add-pegawai'
    ]);

    Route::get('/account/edit', [
        'uses' => 'Pegawai\ActivityController@edit',
        'as' => 'edit-pegawai'
    ]);

    Route::post('/account/edit/update', [
        'uses' => 'Pegawai\ActivityController@update',
        'as' => 'edit-pegawai-update'
    ]);

    Route::post('/account/add', [
        'uses' => 'Pegawai\ActivityController@addpro',
        'as' => 'pegawai-add'
    ]);

    Route::post('/update', [
        'uses' => 'Pegawai\ActivityController@updateuser',
        'as' => 'update-pegawai'
    ]);

    Route::get('/account/edu', [
        'uses' => 'Pegawai\ActivityController@edu',
        'as' => 'edu-pegawai'
    ]);

    Route::post('/account/edu/update', [
        'uses' => 'Pegawai\ActivityController@eduadd',
        'as' => 'edu-add'
    ]);

    Route::get('/account/certificate', [
        'uses' => 'Pegawai\ActivityController@sertificate',
        'as' => 'sertificate-pegawai'
    ]);

    Route::post('/account/certificate/add', [
        'uses' => 'Pegawai\ActivityController@sertificateadd',
        'as' => 'sertificate-add'
    ]);

});

Route::group(['prefix' => 'manajer'], function () {

    Route::get('/', [
        'uses' => 'Manager\ActivityController@index',
        'as' => 'home-manajer'
    ]);

    Route::get('/posisi', [
        'uses' => 'Manager\ActivityController@posisi',
        'as' => 'posisi-manajer'
    ]);

    Route::get('/posisi/form', [
        'uses' => 'Manager\ActivityController@posisiform',
        'as' => 'posisi-form'
    ]);

    Route::post('/posisi/form/save', [
        'uses' => 'Manager\ActivityController@posisisave',
        'as' => 'posisi-save'
    ]);

    Route::post('/posisi/form/delete', [
        'uses' => 'Manager\ActivityController@posisidelete',
        'as' => 'posisi-delete'
    ]);

    Route::post('/posisi/form/update', [
        'uses' => 'Manager\ActivityController@posisiupdate',
        'as' => 'posisi-update'
    ]);

    Route::post('/posisi/form/delete', [
        'uses' => 'Manager\ActivityController@posisidelete',
        'as' => 'posisi-delete'
    ]);

    //laman lamaran

    Route::get('/lamaran', [
        'uses' => 'Manager\ActivityController@lamaran',
        'as' => 'lamaran-manajer'
    ]);

    Route::get('/lamaran/search', [
        'uses' => 'Manager\ActivityController@search',
        'as' => 'lamaran-cari'
    ]);

    Route::get('/lamaran/certificate/{id}', [
        'uses' => 'Manager\ActivityController@certificate',
        'as' => 'certificate-detail'
    ]);

    Route::get('/lamaran/detail/{id}', [
        'uses' => 'Manager\ActivityController@detail',
        'as' => 'lamaran-detail'
    ]);

    // laman account
    Route::get('/account', [
        'uses' => 'Manager\ActivityController@account',
        'as' => 'akun-manajer'
    ]);

    Route::post('/update', [
        'uses' => 'Manager\ActivityController@updateuser',
        'as' => 'update-profile'
    ]);

});

Route::group(['prefix' => 'admin'], function () {

    Route::get('/', [
        'uses' => 'Admin\ActivityController@index',
        'as' => 'home-admin'
    ]);

    Route::post('/add', [
        'uses' => 'Admin\ActivityController@adduser',
        'as' => 'add-admin'
    ]);

    Route::get('/user', [
        'uses' => 'Admin\ActivityController@user',
        'as' => 'user-admin'
    ]);

    Route::get('/user/search', [
        'uses' => 'Admin\ActivityController@search',
        'as' => 'user-cari'
    ]);

    Route::post('/account/reset', [
        'uses' => 'Admin\ActivityController@reset',
        'as' => 'reset'
    ]);

    Route::get('/account', [
        'uses' => 'Admin\ActivityController@account',
        'as' => 'akun-admin'
    ]);

});