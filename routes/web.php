<?php

$this->group(['middleware'=>'auth'],function(){
    $this->get('/', 'Chat\ChatController@index')->name('chat');
    $this->post('chat', 'Chat\ChatController@store');

    $this->get('messages', 'Chat\ChatController@messages')->name('messages');

    Route::get('/home', 'HomeController@index')->name('home');

    
    $this->get('perfil','User\UserController@profile')->name('perfil');
    $this->post('perfil','User\UserController@profileUpdate')->name('profile.update');

});

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();

