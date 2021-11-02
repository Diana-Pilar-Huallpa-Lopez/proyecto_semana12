<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    //
    public function __construct()
    {
        //$this->citaRepository = $citaRepo;
    }

    public function index(Request $request)
    {
        //$citas = $this->citaRepository->all();
        $mensajeeloquent="Hola esta funcionando";
        return view('vuecita.index',compact( 'mensajeeloquent'))        ;
    }

    public function lista(Request $request)
    {
        $cita = Cita::all();
        return $cita;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function store(Request $request)
    {
        $cita = new Cita();
        $cita->id_paciente = $request->id_paciente;
        $cita->fecha_cita = $request->fecha_cita;
        $cita->id_doctor = $request->id_doctor;
        $cita->save();
        //Esta función guardará las tareas que enviaremos mediante vuejs
    }
    public function show(Request $request)
    {
        $cita = Cita::findOrFail($request->id_cita);
        return $cita;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    public function update(Request $request)
    {
        $cita = Cita::findOrFail($request->id_cita);

        $cita->id_paciente = $request->id_paciente;
        $cita->fecha_cita = $request->fecha_cita;
        $cita->id_doctor = $request->id_doctor;

        $cita->save();

        return $cita;
        //Esta función actualizará la tarea que hayamos seleccionado
       
    }

    public function destroy(Request $request)
    {
        $cita = Cita::destroy($request->id_cita);
        return $cita;
        //Esta función obtendra el id_cita de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }

}