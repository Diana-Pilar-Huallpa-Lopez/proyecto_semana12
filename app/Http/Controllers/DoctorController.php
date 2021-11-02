<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    //
    public function __construct()
    {
        //$this->doctorRepository = $doctorRepo;
    }

    public function index(Request $request)
    {
        //$doctors = $this->doctorRepository->all();
        $mensajeeloquent="Hola esta funcionando";
        return view('vuedoctor.index',compact( 'mensajeeloquent'))        ;
    }

    public function lista(Request $request)
    {
        $doctor = Doctor::all();
        return $doctor;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }

    public function store(Request $request)
    {
        $doctor = new Doctor();
        $doctor->ape_nom = $request->ape_nom;
        $doctor->dni = $request->dni;
        $doctor->especialidad = $request->especialidad;
        $doctor->save();
        //Esta función guardará las tareas que enviaremos mediante vuejs
    }
    public function show(Request $request)
    {
        $doctor = Doctor::findOrFail($request->id_doctor);
        return $doctor;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    public function update(Request $request)
    {
        $doctor = Doctor::findOrFail($request->id_doctor);

        $doctor->ape_nom = $request->ape_nom;
        $doctor->dni = $request->dni;
        $doctor->especialidad = $request->especialidad;

        $doctor->save();

        return $doctor;
        //Esta función actualizará la tarea que hayamos seleccionado
       
    }

    public function destroy(Request $request)
    {
        $doctor = Doctor::destroy($request->id_doctor);
        return $doctor;
        //Esta función obtendra el id_doctor de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }

}