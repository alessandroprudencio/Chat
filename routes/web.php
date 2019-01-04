<?php

$this->group(['middleware'=>'auth'],function(){
    $this->get('/', 'Chat\ChatController@index')->name('chat')->middleware('verified');
    $this->post('chat', 'Chat\ChatController@store');

    $this->get('messages', 'Chat\ChatController@messages')->name('messages')->middleware('verified');

    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

    
    $this->get('perfil','User\UserController@profile')->name('perfil');
    $this->post('perfil','User\UserController@profileUpdate')->name('profile.update');

});


Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();

Auth::routes(['verify' => true]);


