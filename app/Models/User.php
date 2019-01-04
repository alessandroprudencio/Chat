<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Chat\Message;
use App\Notifications\ResetPassword;

class User extends Authenticatable implements MustVerifyEmail
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

    public function sendPasswordResetNotification($token)
    {
    $this->notify(new ResetPassword($token));
    }
}
