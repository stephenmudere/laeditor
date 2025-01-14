<?php

$as = "";
if(\Steve\Laraadmin\Helpers\LAHelper::laravel_ver() >= 5.4) {
	$as = config('laraadmin.adminRoute').'.';
}

Route::group([
    'namespace'  => 'Steve\Laeditor\Controllers',
	'as' => $as,
    'middleware' => ['web', 'auth', 'permission:ADMIN_PANEL', 'role:SUPER_ADMIN']
], function () {
    /* ================== Code Editor ================== */
	Route::get(config('laraadmin.adminRoute') . '/laeditor', 'CodeEditorController@index');
	Route::any(config('laraadmin.adminRoute') . '/laeditor_get_dir', 'CodeEditorController@get_dir');
	Route::post(config('laraadmin.adminRoute') . '/laeditor_get_file', 'CodeEditorController@get_file');
	Route::post(config('laraadmin.adminRoute') . '/laeditor_save_file', 'CodeEditorController@save_file');
});
