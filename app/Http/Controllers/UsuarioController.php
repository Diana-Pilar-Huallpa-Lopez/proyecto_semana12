<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    //
    public function __construct()
    {
        //$this->usuarioRepository = $usuarioRepo;
    }

    public function index(Request $request)
    {
        //$usuarios = $this->usuarioRepository->all();
        $mensajeeloquent="Hola esta funcionando";
        return view('vueusuario.index',compact( 'mensajeeloquent'))        ;
    }

    public function lista(Request $request)
    {
        $usuario = Usuario::all();
        return $usuario;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function store(Request $request)
    {
        $usuario = new Usuario();
        $usuario->ape_nom = $request->ape_nom;
        $usuario->usuario = $request->usuario;
        $usuario->password = $request->password;
        
        $usuario->save();
        //Esta función guardará las tareas que enviaremos mediante vuejs
    }
    public function show(Request $request)
    {
        $usuario = Usuario::findOrFail($request->id_usuario);
        return $usuario;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    public function update(Request $request)
    {
        $usuario = Usuario::findOrFail($request->id_usuario);

        $usuario->ape_nom = $request->ape_nom;
        $usuario->usuario = $request->usuario;
        $usuario->password = $request->password;
        

        $usuario->save();

        return $usuario;
        //Esta función actualizará la tarea que hayamos seleccionado
       
    }

    public function destroy(Request $request)
    {
        $usuario = Usuario::destroy($request->id_usuario);
        return $usuario;
        //Esta función obtendra el id_usuario de la tarea que hayamos seleccionado y la borrará de nuestra BD  
    }

}