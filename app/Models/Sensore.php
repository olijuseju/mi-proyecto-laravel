<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensore extends Model
{
    /**
     * Esta clase guarda los datos de un sensor
     * En el array fillable se encuentran sus campos
     *
     * @param String name
     * @param String description
     * @param String model
     */
    use HasFactory;
    protected $fillable = ['name', 'description', 'model'];

}
