<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Paciente
 * @package App\Models
 * @version October 21, 2021, 2:21 am UTC
 *
 * @property string $apellido
 * @property string $nombre
 */
class Paciente extends Model
{
    //
     //use SoftDeletes;

     public $table = 'paciente';
     protected $primaryKey= 'id_paciente';
     public $timestamps =false;
 
     
     const CREATED_AT = 'created_at';
     const UPDATED_AT = 'updated_at';
 
 
     protected $dates = ['deleted_at'];
 
 
 
     public $fillable = [
         'apellido',
         'nombre'
     ];
 
     /**
      * The attributes that should be casted to native types.
      *
      * @var array
      */
     protected $casts = [
         'id_paciente' => 'integer',
         'apellido' => 'string',
         'nombre' => 'string'
     ];
 
     /**
      * Validation rules
      *
      * @var array
      */
     public static $rules = [
         'apellido' => 'nullable|string|max:45',
         'nombre' => 'nullable|string|max:45'
     ];
}
