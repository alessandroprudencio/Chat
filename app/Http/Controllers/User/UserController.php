<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile()
    {
        return view('users.profile');
    }
    public function profileUpdate(Request $request)
    {
        $usuarioLogado = auth()->user(); 
        $dataUser = $request->all();

        if($request->password){
            $dataUser['password']  = bcrypt($dataUser['password']);
        }else{
            unset($dataUser['password']);
        }

        //validations
        if($request->hasFile('image') && $request->file('image')->isValid()){
    
                if($usuarioLogado->image && Storage::exists("users/{$usuarioLogado->image}")){
                    Storage::delete("users/{$usuarioLogado->image}");
                }

            $name = kebab_case($request->name).uniqid($usuarioLogado->id);
            $ext = $request->image->extension();
            $nameImage = "{$name}.$ext";

            $data['image'] = $nameImage;

            $upload = $request->image->storeAs('users',$nameImage);
            if(!$upload){
                return redirect()
                ->route('perfil')
                ->with('error','Falha ao fazer upload');
            }
        }


        $usuarioLogado->update($dataUser);
        $usuarioLogado->update($data);

            return redirect()
            ->route('perfil')
            ->with('success',' Atualizado com Sucesso!');
    
    }
}
