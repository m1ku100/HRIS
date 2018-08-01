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

    //Resume Page Control

    Route::get('/resume', [
        'uses' => 'Pegawai\ActivityController@resume',
        'as' => 'resume-pegawai'
    ]);

    Route::get('/resume/add', [
        'uses' => 'Pegawai\ActivityController@add',
        'as' => 'add-pegawai'
    ]);

    Route::get('/resume/edit', [
        'uses' => 'Pegawai\ActivityController@edit',
        'as' => 'edit-pegawai'
    ]);

    Route::post('/resume/edit/update', [
        'uses' => 'Pegawai\ActivityController@update',
        'as' => 'edit-pegawai-update'
    ]);

    Route::get('/resume/work/add', [
        'uses' => 'Pegawai\ActivityController@work',
        'as' => 'work-form'
    ]);

    Route::post('/resume/work/add', [
        'uses' => 'Pegawai\ActivityController@workadd',
        'as' => 'work-add'
    ]);

    Route::get('/resume/work/{id}', [
        'uses' => 'Pegawai\ActivityController@workedit',
        'as' => 'work-edit'
    ]);

    Route::post('/resume/work/upate', [
        'uses' => 'Pegawai\ActivityController@workupdate',
        'as' => 'work-update'
    ]);

    Route::post('/resume/work/delete', [
        'uses' => 'Pegawai\ActivityController@workdelete',
        'as' => 'work-delete'
    ]);

    Route::get('/resume/edu', [
        'uses' => 'Pegawai\ActivityController@edu',
        'as' => 'edu-pegawai'
    ]);

    Route::post('/resume/edu/add', [
        'uses' => 'Pegawai\ActivityController@eduadd',
        'as' => 'edu-add'
    ]);

    Route::get('/resume/edu/{id}', [
        'uses' => 'Pegawai\ActivityController@eduedit',
        'as' => 'edu-edit'
    ]);

    Route::post('/resume/edu/upate', [
        'uses' => 'Pegawai\ActivityController@eduupdate',
        'as' => 'edu-update'
    ]);

    Route::post('/resume/edu/delete', [
        'uses' => 'Pegawai\ActivityController@edudelete',
        'as' => 'edu-delete'
    ]);

    Route::post('/resume/skill/', [
        'uses' => 'Pegawai\ActivityController@skill',
        'as' => 'skill-pegawai'
    ]);

    Route::post('/resume/skill/upate', [
        'uses' => 'Pegawai\ActivityController@skillupdate',
        'as' => 'skill-update'
    ]);

    Route::post('/resume/skill/delete', [
        'uses' => 'Pegawai\ActivityController@skilldelete',
        'as' => 'skill-delete'
    ]);

    Route::post('/resume/bhs/', [
        'uses' => 'Pegawai\ActivityController@bhs',
        'as' => 'bhs-pegawai'
    ]);

    Route::post('/resume/bhs/upate', [
        'uses' => 'Pegawai\ActivityController@bhsupdate',
        'as' => 'bhs-update'
    ]);

    Route::post('/resume/bhs/delete', [
        'uses' => 'Pegawai\ActivityController@bhsdelete',
        'as' => 'bhs-delete'
    ]);

    Route::post('/resume/certificate/add', [
        'uses' => 'Pegawai\ActivityController@sertificateadd',
        'as' => 'sertificate-add'
    ]);

    Route::post('/resume/certificate/update', [
        'uses' => 'Pegawai\ActivityController@sertificateupdate',
        'as' => 'sertificate-update'
    ]);

    Route::post('/resume/certificate/delete', [
        'uses' => 'Pegawai\ActivityController@sertificatedelete',
        'as' => 'sertificate-delete'
    ]);

    //Account Page Control

    Route::get('/account', [
        'uses' => 'Pegawai\ActivityController@account',
        'as' => 'akun-pegawai'
    ]);

    Route::post('/account/add', [
        'uses' => 'Pegawai\ActivityController@addpro',
        'as' => 'pegawai-add'
    ]);

    Route::post('/update', [
        'uses' => 'Pegawai\ActivityController@updateuser',
        'as' => 'update-pegawai'
    ]);

    Route::get('/account/certificate', [
        'uses' => 'Pegawai\ActivityController@sertificate',
        'as' => 'sertificate-pegawai'
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

    Route::post('/posisi/form/hide', [
        'uses' => 'Manager\ActivityController@hide',
        'as' => 'posisi-hide'
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

    Route::post('/lamaran/active', [
        'uses' => 'Manager\ActivityController@proses',
        'as' => 'lamaran-proses'
    ]);

    Route::get('/lamaran/certificate/{id}', [
        'uses' => 'Manager\ActivityController@certificate',
        'as' => 'certificate-detail'
    ]);

    Route::get('/lamaran/detail/{id}', [
        'uses' => 'Manager\ActivityController@detail',
        'as' => 'lamaran-detail'
    ]);

    //laman user
    Route::get('/user', [
        'uses' => 'Manager\ActivityController@user',
        'as' => 'user-manajer'
    ]);

    Route::get('/pegawai/detail/{id}', [
        'uses' => 'Manager\ActivityController@pegawai',
        'as' => 'pegawai-detail'
    ]);

    Route::get('/pegawai/search', [
        'uses' => 'Manager\ActivityController@pegawaisearch',
        'as' => 'pegawai-cari'
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