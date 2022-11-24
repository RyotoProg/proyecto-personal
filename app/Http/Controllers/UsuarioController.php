<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // metodo para realizar el registro del usuario y las validaciones
    public function createUsuario(Request $request){

        $this->validate(request(), [
            'nombre'=>'required',
            'apellido'=>'required',
            'correo'=>'required|email',
            'password'=>'required|confirmed'
        ]);
        $id= date('z').''.date("j").''.date("n").''.date("Y").''.date('g').''.date('i').''.date('s');

        $correo = $request->correo;
        $user = User::where('correo','=',$correo)->get();
        $count = count($user);
        if($count > 0){
            return back()->withErrors([
                'correo' => 'El correo ya existe, porfavor ingrese uno diferente'
            ]);
        }

        $usuario = User::create(['id'=>$id, 'nombre'=>$request->nombre,'apellido'=>$request->apellido,'correo'=>$request->correo,'password'=>$request->password]);

        auth()->login($usuario);
        return redirect()->to('/');
    }

    // metodo para realizar el login
    public function sessionCreate(Request $request){
        if(auth()->attempt(request(['correo', 'password'])) == false){
            return back()->withErrors([
                'message' => 'El correo o la contraseña son incorrectas, porfavor intenta denuevo',
            ]);
        }
        return redirect()->to('/');
    }

    //metodo para cerrar sesion
    public function sessionDestroy(Request $request){
        auth()->logout();
        return redirect()->to('/login');
    }
}
