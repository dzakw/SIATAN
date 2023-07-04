<?php

use Illuminate\Support\Facades\{Route, Auth};

    Route::get('/', 'Auth\LoginController@index');
    Auth::routes(['register' => false]);

    Route::prefix('admin')
        ->middleware('auth')
        ->group(function () {
            Route::redirect('/','admin/ketua/gapoktan/index')->name('dashboard.admin');
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
            Route::get('pinjaman_pdf', 'PinjamanController@cetak_pdf')->name('pinjaman.pdf');
        });

        Route::prefix('admin/ketua/gapoktan')
        ->middleware('auth')
        ->group(function () {
            Route::get('index', 'GapoktanController@index')->name('ketua.gapoktan.index');
            Route::get('create', 'GapoktanController@create')->name('ketua.gapoktan.create');
            Route::get('show/{gapoktan}', 'GapoktanController@show')->name('ketua.gapoktan.show');
            Route::put('update/{gapoktan}', 'GapoktanController@update')->name('ketua.gapoktan.update');
            Route::post('store', 'GapoktanController@store')->name('ketua.gapoktan.store');
            Route::get('edit/{gapoktan}', 'GapoktanController@edit')->name('ketua.gapoktan.edit');
            Route::delete('delete/{gapoktan}', 'GapoktanController@destroy')->name('ketua.gapoktan.destroy');
        });

        Route::prefix('admin/ketua/gapoktan/show/{gapoktan}/poktan')
        ->middleware('auth')
        ->group(function(){
            Route::get('show/{poktan}', 'PoktanController@show')->name('ketua.poktan.show');
            Route::get('create', 'PoktanController@create')->name('ketua.poktan.create');
            Route::get('edit/{poktan}', 'PoktanController@edit')->name('ketua.poktan.edit');
            Route::get('anggota/{poktan}', 'PoktanController@anggota')->name('ketua.poktan.anggota');
            Route::post('store', 'PoktanController@store')->name('ketua.poktan.store');
            Route::put('{poktan}', 'PoktanController@update')->name('ketua.poktan.update');
            Route::delete('delete/{poktan}', 'PoktanController@destroy')->name('ketua.poktan.destroy');
        });

        Route::prefix('admin/ketua/gapoktan/show/{gapoktan}/poktan/show/{poktan}/anggota')
        ->middleware('auth')
        ->group(function(){
            Route::get('show/{anggota}', 'AnggotaPoktanController@show')->name('ketua.anggota.show');
            Route::get('create', 'AnggotaPoktanController@create')->name('ketua.anggota.create');
            Route::get('edit/{anggota}', 'AnggotaPoktanController@edit')->name('ketua.anggota.edit');
            Route::post('store', 'AnggotaPoktanController@store')->name('ketua.anggota.store');
            Route::put('{anggota}', 'AnggotaPoktanController@update')->name('ketua.anggota.update');
            Route::delete('delete/{anggota}', 'AnggotaPoktanController@destroy')->name('ketua.anggota.destroy');
        });

        Route::prefix('admin/ketua/gapoktan/show/{gapoktan}/poktan/show/{poktan}/anggota/show/{anggota}/pinjaman')
        ->middleware('auth')
        ->group(function(){
            Route::get('show/{pinjaman}', 'PinjamanController@show')->name('ketua.pinjaman.show');
            Route::get('create', 'PinjamanController@create')->name('ketua.pinjaman.create');
            Route::get('edit/{pinjaman}', 'PinjamanController@edit')->name('ketua.pinjaman.edit');
            Route::post('store', 'PinjamanController@store')->name('ketua.pinjaman.store');
            Route::put('{pinjaman}', 'PinjamanController@update')->name('ketua.pinjaman.update');
            Route::delete('delete/{pinjaman}', 'PinjamanController@destroy')->name('ketua.pinjaman.destroy');
            Route::post('pinjaman/bayar', 'PinjamanController@bayar')->name('ketua.pinjaman.bayar');
        });

