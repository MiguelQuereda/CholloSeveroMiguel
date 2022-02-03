<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CholloSevero extends Model
{
    use HasFactory;

    public function Usuario()
    {
        return $this->belongsTo(User::class);
        /*
        $usuario = User::find(1);
        return $comentario -> User -> titulo;
    */
    }
    
    
}
