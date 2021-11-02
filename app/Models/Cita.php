<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cita
 * @package App\Models
 * @version October 21, 2021, 2:21 am UTC
 *
 * @property string $id_paciente
 * @property string $fecha_cita
 */
class Cita extends Model
{
    //
     //use SoftDeletes;

     public $table = 'citas';
     protected $primaryKey= 'id_cita';
     public $timestamps =false;
 
     
     const CREATED_AT = 'created_at';
     const UPDATED_AT = 'updated_at';
 
 
     protected $dates = ['deleted_at'];
 
 
 
     public $fillable = [
         'id_paciente',
         'fecha_cita',
         'id_doctor'
     ];
 
     /**
      * The attributes that should be casted to native types.
      *
      * @var array
      */
     protected $casts = [
         'id_cita' => 'integer',
         'id_paciente' => 'string',
         'fecha_cita' => 'string',
         'id_doctor' => 'string'
     ];
 
     /**
      * Validation rules
      *
      * @var array
      */
     public static $rules = [
         'id_paciente' => 'nullable|string|max:45',
         'fecha_cita' => 'nullable|string|max:45',
         'id_doctor' => 'nullable|string|max:45'
     ];
}
