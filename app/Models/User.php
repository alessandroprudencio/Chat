<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Chat\Message;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','provider','provider_id', 'image'
    ];    
    protected $appends = ['owner'];


    public function getOwnerAttribute(){
        return $this->user_id == auth()->user()->id; // o valor da coluna user_Id na tabela message e iqual ao usuario logado        
    }
    protected $hidden = [
        'password', 'remember_token',
    ];

    public  function messages()
    {
        return $this->hasMany(Message::class);
    }
}
