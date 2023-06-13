<?php

use Illuminate\Support\Facades\{Route, Auth};

Route::get('/', 'Auth\LoginController@index');
Auth::routes(['register' => false]);

Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'Admin\DashboardController@index')->name('dashboard.admin');
        Route::resource('anggota_poktan', 'Admin\AnggotaPoktanController');
        Route::get('profile', 'Admin\DashboardController@profile')->name('admin.profile');
        Route::put('update-profile/{user}', 'Admin\DashboardController@update_profile')->name('admin.update-profile');
        Route::get('pengaturan', 'Admin\DashboardController@pengaturan')->name('admin.pengaturan');
        Route::put('update-pengaturan/{user}', 'Admin\DashboardController@update_pengaturan')->name('admin.update-pengaturan');
        Route::resource('pinjaman', 'PinjamanController');
        Route::get('bayar-pinjaman/{id}', 'PinjamanController@bayar_pinjaman')->name('pinjaman.bayar');
        Route::get('bayar-pinjaman/{id}/{bayarpinjamid}', 'PinjamanController@bayar_pinjaman_detail')->name('pinjaman.bayar.detail');
        Route::put('bayar-pinjaman/{id}/{bayarpinjamid}', 'PinjamanController@bayar_pinjaman_post')->name('pinjaman.bayar.post');
        Route::resource('anggota_poktan', 'Admin\AnggotaPoktanController');
    });

Route::prefix('ketua')
    ->middleware('ketua')
    ->group(function () {
        Route::get('/', 'Ketua\DashboardController@index')->name('dashboard.ketua');
        Route::resource('user', 'Ketua\UserController');
        Route::resource('pengaturan', 'Ketua\PengaturanController');
        Route::get('pinjaman_pdf', 'Ketua\PinjamanController@cetak_pdf')->name('pinjaman.pdf');
        Route::get('pinjaman_excel', 'Ketua\PinjamanController@cetak_excel')->name('pinjaman.excel');
        Route::resource('pinjaman-ketua', 'Ketua\PinjamanController')->except(['create', 'store', 'edit']);
    });

    Route::get('/admin/ketua/gapoktan/index', 'GapoktanController@index')->name('ketua.gapoktan.index');
    Route::get('/admin/ketua/gapoktan/create', 'GapoktanController@create')->name('ketua.gapoktan.create');
    Route::get('/admin/ketua/gapoktan/show/{gapoktan}', 'GapoktanController@show')->name('ketua.gapoktan.show');
    Route::put('/admin/ketua/gapoktan/update/{gapoktan}', 'GapoktanController@update')->name('ketua.gapoktan.update');
    Route::post('/admin/ketua/gapoktan/store', 'GapoktanController@store')->name('ketua.gapoktan.store');
    Route::get('/admin/ketua/gapoktan/edit/{gapoktan}', 'GapoktanController@edit')->name('ketua.gapoktan.edit');
    Route::delete('/admin/ketua/gapoktan/delete/{gapoktan}', 'GapoktanController@destroy')->name('ketua.gapoktan.destroy');


    Route::get('/admin/ketua/poktan/index', 'PoktanController@index')->name('poktan.index');
    Route::get('/admin/ketua/poktan/show/{poktan}', 'PoktanController@show')->name('poktan.show');
    Route::get('/admin/ketua/poktan/create', 'App\Http\Controllers\PoktanController@create')->name('poktan.create');
    Route::get('/admin/ketua/poktan/edit/{poktan}', 'PoktanController@edit')->name('poktan.edit');
    Route::get('/admin/ketua/poktan/anggota/{poktan}', 'PoktanController@anggota')->name('poktan.anggota');
    Route::get('/admin/ketua/poktan/create', 'PoktanController@create')->name('ketua.poktan.create');
    Route::post('/admin/ketua/poktan/store', 'PoktanController@store')->name('ketua.poktan.store');
