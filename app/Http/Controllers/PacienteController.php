<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
{
    //
    public function __construct()
    {
        //$this->pacienteRepository = $pacienteRepo;
    }

    public function index(Request $request)
    {
        //$pacientes = $this->pacienteRepository->all();
        $mensajeeloquent="Hola esta funcionando";
        return view('vuepaciente.index',compact( 'mensajeeloquent'))        ;
    }

    public function lista(Request $request)
    {
        $paciente = Paciente::all();
        return $paciente;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function store(Request $request)
    {
        $paciente = new Paciente();
        $paciente->ape_nom = $request->ape_nom;
        $paciente->dni = $request->dni;
        $paciente->celular = $request->celular;
        $paciente->save();
        //Esta función guardará las tareas que enviaremos mediante vuejs
    }
    public function show(Request $request)
    {
        $paciente = Paciente::findOrFail($request->idpaciente);
        return $paciente;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    public function update(Request $request)
    {
        $paciente = Paciente::findOrFail($request->idpaciente);

        $paciente->ape_nom = $request->ape_nom;
        $paciente->dni = $request->dni;
        $paciente->celular = $request->celular;

        $paciente->save();

        return $paciente;
        //Esta función actualizará la tarea que hayamos seleccionado
       
    }

    public function destroy(Request $request)
    {
        $paciente = Paciente::destroy($request->idpaciente);
        return $paciente;
        //Esta función obtendra el idpaciente de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }

}