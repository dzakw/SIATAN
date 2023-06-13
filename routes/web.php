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

    Route::prefix('admin/ketua/gapoktan')
    ->group(function () {
        Route::get('show/{gapoktan_id}/create', 'PoktanController@create')->name('ketua.gapoktan.show.create');
        Route::get('index', 'GapoktanController@index')->name('ketua.gapoktan.index');
        Route::get('create', 'GapoktanController@create')->name('ketua.gapoktan.create');
        Route::get('show/{gapoktan}', 'GapoktanController@show')->name('ketua.gapoktan.show');
        Route::get('show/{gapoktan_id}', 'GapoktanController@show')->name('ketua.gapoktan.show');
        Route::put('update/{gapoktan}', 'GapoktanController@update')->name('ketua.gapoktan.update');
        Route::post('store', 'GapoktanController@store')->name('ketua.gapoktan.store');
        Route::get('edit/{gapoktan}', 'GapoktanController@edit')->name('ketua.gapoktan.edit');
        Route::delete('delete/{gapoktan}', 'GapoktanController@destroy')->name('ketua.gapoktan.destroy');
        Route::get('show/{gapoktan_id}/create', 'PoktanController@create')->name('admin.ketua.gapoktan.show.create');
    });

    Route::prefix('admin/ketua/gapoktan/show/{gapoktan_id}/poktan')
    ->group(function(){
        Route::get('index', 'PoktanController@index')->name('ketua.poktan.index');
        Route::get('show/{poktan}', 'PoktanController@show')->name('ketua.poktan.show');
        Route::get('create', 'PoktanController@create')->name('ketua.poktan.create');
        Route::get('show/{poktan}', 'PoktanController@show')->name('ketua.poktan.show');
        Route::get('edit/{poktan}', 'PoktanController@edit')->name('ketua.poktan.edit');
        Route::get('anggota/{poktan}', 'PoktanController@anggota')->name('ketua.poktan.anggota');
        Route::post('store', 'PoktanController@store')->name('ketua.poktan.store');
    });

    Route::prefix('admin/ketua/gapoktan/show/{gapoktan_id}/poktan/show/{poktan_id}/anggota')
    ->group(function(){
        Route::get('index', 'AnggotaPoktanController@index')->name('ketua.anggota.index');
        Route::get('show/{anggota}', 'AnggotaPoktanController@show')->name('ketua.anggota.show');
        Route::get('create', 'AnggotaPoktanController@create')->name('ketua.anggota.create');
        Route::get('show/{anggota}', 'AnggotaPoktanController@show')->name('ketua.anggota.show');
        Route::get('edit/{anggota}', 'AnggotaPoktanController@edit')->name('ketua.anggota.edit');
        Route::post('store', 'AnggotaPoktanController@store')->name('ketua.anggota.store');
    });


