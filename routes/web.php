<?php

$this->group(['middleware'=>'auth'],function(){
    $this->get('/', 'Chat\ChatController@index')->name('chat');
    $this->post('chat', 'Chat\ChatController@store');

    $this->get('messages', 'Chat\ChatController@messages')->name('messages');

    $this->get('perfil','User\UserController@profile')->name('perfil');
    $this->post('perfil','User\UserController@profileUpdate')->name('profile.update');

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
