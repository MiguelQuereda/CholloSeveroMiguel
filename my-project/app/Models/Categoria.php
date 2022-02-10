<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public function chollosevero(){
        return $this->belongsToMany(CholloSevero::class);
    }

    // INSERT INTO usuarios (nombre, apellidos) VALUES ('Juan','Garcia Pérez');
}
