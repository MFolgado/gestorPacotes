<?php

    Route::resource('accounts', 'AccountsController');

    Route::get('accounts/{account}/role', 'AccountsController@getRole')->name('accounts.role');

//    Route::prefix('accounts/{account_id}')->group(function () {
//        Route::resource('account_roles', 'RolesController');
//    });

