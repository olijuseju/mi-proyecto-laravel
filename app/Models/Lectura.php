<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectura extends Model
{
    use HasFactory;
    protected $fillable = ['data', 'time_data', 'id_sensor', 'latitud', 'longitud'];
}
