<?php

use think\facade\Route;

Route::group('api', function () {
    Route::post('/login', 'Auth/login');
    Route::post('/logout', 'Auth/logout');
    Route::post('/check', 'Auth/check');

    Route::group(function () {
        Route::get('/admins', 'Admin/index');
        Route::post('/admin', 'Admin/store');
        Route::get('/admin/:id', 'Admin/info');
        Route::delete('/admin/:id', 'Admin/destory');

        Route::post('/me/password', 'Me/resetPassword');

        Route::post('/files/image/:dir', 'File/uploadImage');

        Route::get('/articles', 'Article/index');
        Route::post('/article', 'Article/store');
        Route::get('/article/:id', 'Article/info');
        Route::delete('/article/:id', 'Article/destory');

        Route::get('/users', 'User/index');
        Route::get('/user/:id', 'User/info');
    })->middleware(\app\admin\middleware\Auth::class);
});


Route::get('/article/:id', 'Article/view');
Route::get('/[:name1]/[:name2]/[:name3]/[:name4]/[:name5]', 'Index/index');

