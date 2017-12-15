<?php

Route::resource('roles', 'RolesController');

Route::prefix('role/{role_id}')->group(function () {
    Route::get('permissions', 'RolesController@permissions')->name('role.permissions');
});

Route::post('/permissions/toogle', 'RolesController@tooglePermissions')->name('role.toogle');
