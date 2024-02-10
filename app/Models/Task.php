<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'asignatario',
        'fecha_inicio',
        'fecha_termino',
        'costo',
        'etiquetas',
    ];
}
