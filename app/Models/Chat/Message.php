<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Carbon\Carbon;


class Message extends Model //retorna msg
{
    protected $fillable = ['body'];
    protected $appends = ['owner'];

    public function getOwnerAttribute(){
        return $this->user_id == auth()->user()->id; // o valor da coluna user_Id na tabela message e iqal ao usuario logado        
    }

    public function  getCreateAttribute($value){
        return Carbon\Carbon::parse($value)->format('d/m/Y H:i');
    }
    
    public function user() //rtorna usuario da mensagem
    {
       return $this->belongsTo(User::class);
    }
}
