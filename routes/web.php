<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('doctor', 'DoctorController');

Route::get('/doctor', 'DoctorController@lista');
Route::put('/doctor/actualizar', 'DoctorController@update');
Route::post('/doctor/guardar', 'DoctorController@store');
Route::delete('/doctor/borrar/{iddoctor}', 'DoctorController@destroy');
Route::get('/doctor/buscar', 'DoctorController@show');

Route::resource('vuedoctor', 'DoctorController');


Route::resource('usuario', 'UsuarioController');
Route::get('/usuario', 'UsuarioController@lista');
Route::put('/usuario/actualizar', 'UsuarioController@update');
Route::post('/usuario/guardar', 'UsuarioController@store');
Route::delete('/usuario/borrar/{idusuario}', 'UsuarioController@destroy');
Route::get('/usuario/buscar', 'UsuarioController@show');

Route::resource('vueusuario', 'UsuarioController');


Route::resource('paciente', 'PacienteController');
Route::get('/paciente', 'PacienteController@lista');
Route::put('/paciente/actualizar', 'PacienteController@update');
Route::post('/paciente/guardar', 'PacienteController@store');
Route::delete('/paciente/borrar/{idpaciente}', 'PacienteController@destroy');
Route::get('/paciente/buscar', 'PacienteController@show');

Route::resource('vuepaciente', 'PacienteController');

Route::resource('cita', 'CitaController');
Route::get('/cita', 'citaController@lista');
Route::put('/cita/actualizar', 'citaController@update');
Route::post('/cita/guardar', 'citaController@store');
Route::delete('/cita/borrar/{idcita}', 'citaController@destroy');
Route::get('/cita/buscar', 'citaController@show');

Route::resource('vuecita', 'citaController');


Route::resource('detalle', 'DetalleController');
Route::get('/detalle', 'DetalleController@lista');
Route::put('/detalle/actualizar', 'DetalleController@update');
Route::post('/detalle/guardar', 'DetalleController@store');
Route::delete('/detalle/borrar/{iddetalle}', 'DetalleController@destroy');
Route::get('/detalle/buscar', 'DetalleController@show');

Route::resource('vuedetalle', 'DetalleController');

