<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalle;

class DetalleController extends Controller
{
    //
    public function __construct()
    {
        //$this->detalleRepository = $detalleRepo;
    }

    public function index(Request $request)
    {
        //$detalles = $this->detalleRepository->all();
        $mensajeeloquent="Hola esta funcionando";
        return view('vuedetalle.index',compact( 'mensajeeloquent'))        ;
    }

    public function lista(Request $request)
    {
        $detalle = Detalle::all();
        return $detalle;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function store(Request $request)
    {
        $detalle = new Detalle();
        $detalle->id_cita = $request->id_cita;
        $detalle->save();
        //Esta función guardará las tareas que enviaremos mediante vuejs
    }
    public function show(Request $request)
    {
        $detalle = Detalle::findOrFail($request->id_detallecita);
        return $detalle;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    public function update(Request $request)
    {
        $detalle = Detalle::findOrFail($request->id_detallecita);
        $detalle->id_cita = $request->id_cita;

        $detalle->save();

        return $detalle;
        //Esta función actualizará la tarea que hayamos seleccionado
       
    }

    public function destroy(Request $request)
    {
        $detalle = Detalle::destroy($request->id_detallecita);
        return $detalle;
        //Esta función obtendra el id_detallecita de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }

}