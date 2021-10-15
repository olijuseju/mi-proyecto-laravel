<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectura extends Model
{
    /**
     * Esta clase guarda los datos de una lectura
     * En el array fillable se encuentran sus campos
     *
     * @param double data
     * @param Fecha time_data
     * @param int id_sensor
     * @param double laltitud
     * @param double longitud
     */

    use HasFactory;
    protected $fillable = ['data', 'time_data', 'id_sensor', 'latitud', 'longitud'];
}
