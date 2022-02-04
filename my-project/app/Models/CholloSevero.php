<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CholloSevero extends Model
{
    use HasFactory;
    

    public function usuario()
    {
        return $this->belongsTo(User::class);
        /*
        $usuario = User::find(1);
        return $comentario -> User -> titulo;
    */
        // Estructura Tabla muchos a muchos (pivote)
        // php artisan make:migration create_categoria_chollosevero_table --create=categoria_chollosevero
    }

    public function categorias()
    {
        return $this -> belongsToMany(Categoria::class);
    }



}
