<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Detalle
 * @package App\Models
 * @version October 21, 2021, 2:21 am UTC
 *
 * @property string $detallecita
 * @property string $idcita
 */
class Detalle extends Model
{
    //
     //use SoftDeletes;

     public $table = 'citas_detalle';
     protected $primaryKey= 'id_detallecita';
     public $timestamps =false;
 
     
     const CREATED_AT = 'created_at';
     const UPDATED_AT = 'updated_at';
 
 
     protected $dates = ['deleted_at'];
 
 
 
     public $fillable = [
         'detallecita',
         'idcita'
     ];
 
     /**
      * The attributes that should be casted to native types.
      *
      * @var array
      */
     protected $casts = [
         'iddetalle' => 'integer',
         'detallecita' => 'string',
         'idcita' => 'string'
     ];
 
     /**
      * Validation rules
      *
      * @var array
      */
     public static $rules = [
         'detallecita' => 'nullable|string|max:45',
         'idcita' => 'nullable|string|max:45'
     ];
}
