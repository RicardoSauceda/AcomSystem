<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class Profesor extends Model
{
     //queryScope
    
    public function scopeNombre($query, $nombre)
    {
        if($nombre)
            return $query->where('nombre', 'LIKE', "%$nombre%");

    }

    public function scopeDepartamento($query, $departamento)
    {
        if($departamento)
            return $query->where('departamento', 'LIKE', "%$departamento%");

    }

    public function scopeCategoria($query, $categoria)
    {
        if($categoria)
            return $query->where('categoria', 'LIKE', "%$categoria%");

    }
}
