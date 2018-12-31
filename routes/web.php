<?php

$this->group(['middleware'=>'auth'],function(){
    $this->get('chat', 'Chat\ChatController@index')->name('chat');
    $this->post('chat', 'Chat\ChatController@store');

    $this->get('messages', 'Chat\ChatController@messages')->name('messages');

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
