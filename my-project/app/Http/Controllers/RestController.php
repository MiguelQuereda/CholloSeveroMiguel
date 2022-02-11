<?php

namespace App\Http\Controllers;

use App\Models\CholloSevero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RestController extends Controller
{
    //

    public function restList()
    {
        $restChollos = Http::get('http://localhost/api/chollos')->collect();
        return view('rest', compact("restChollos"));

        /**
         *  En la vista ponemos
         *      @foreach ($restChollos as $chollo)
         *      <p>ID: {{$chollo["id"]}}</p> // columna id
         *      <p>Nombre: {{$chollo["nombre"]}}</p> // columna id
         *      @endforeach
         */
    }

    public function index()
    {

        // $restChollos = Http::get('http://localhost/api/chollos') -> collect(); // PARA API EXTERNA

        $chollos = CholloSevero::all();

        return view('rest', compact('chollos'));
    }
}
