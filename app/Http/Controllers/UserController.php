<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Imagen;

class UserController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function editProfile(Request $request){
        
    }

    public function changePassword(Request $request)
    {
        
    }
    public function getAll(){
        $usuarios=\App\Models\Usuario::all();
        return $usuarios;
    }
    public function deleteusuarios($id){
        $usuario = \App\Models\Usuario::find($id);
        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
        $usuario->delete();
        return response()->json(['mensaje' => 'Usuario eliminado correctamente'], 200);
    }
    
    public function getUsuario($id){
        $usuarios1=\App\Models\Usuario::find($id);
        return $usuarios1;
    }

    public function editusuarios($id, Request $request){
        $usuarios2=$this->getUsuario($id);
        $usuarios2=fill($request->all())->save();
        return $usuarios2;
    }

    public function saveusuarios(Request $request){
    $validator = $this->validate($request, [
        'nombre' => 'required|string|max:255',
        'email' => 'required|string|max:255|email|unique:usuarios',
        'rol' => 'required',
        'img' => 'required',
    ]);
    $userdata = $request->except('_token');
    if ($request->hasFile('img')) {
        $userdata['img'] = $request->file('img')->store('uploads', 'public');
    }

    \App\Models\Usuario::insert($userdata);

    return response()->json(['codigo' => '1',
                            'descripción' => 'Guardado']);
    }
    
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
