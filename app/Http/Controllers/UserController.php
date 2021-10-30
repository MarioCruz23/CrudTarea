<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Imagen;

class UserController extends Controller
{
    public function listar(){
        $data['users']= \App\Models\Usuario::paginate(3);
        return view('usuarios.listar', $data);
    }

    public function userform(){
        return view('usuarios.userform');
    }
    public function save(Request $request){
        
        $validator = $this->validate($request, [
            'nombre'=> 'required|string|max:255',
            'email'=> 'required|string|max:255|email|unique:usuarios',
            'rol' => 'required',
            'img' => 'required',
        ]);
        $userdata = request()->except('_token');
        if($request->hasFile('img')){
            $userdata['img']=$request->file('img')->store('uploads','public');
        }
        \App\Models\Usuario::insert($userdata);
        return back()->with('UsuarioGuardado','Usuario Guardado');
    }
    public function delete($id){
        \App\Models\Usuario::destroy($id);
        return back()->with('usuarioEliminado','Usuario eliminado');
    }
    public function editform($id){
        $usuario = \App\Models\Usuario::findOrFail($id);
        return view('usuarios.editform', compact('usuario'));
    }
    public function edit(Request $request, $id){
        $datosUsuario = request()->except((['_token', '_method']));
        \App\Models\Usuario::where('id', '=', $id)->update($datosUsuario);
        return back()->with('usuarioModificado','Usuario modificado');
    }
}
