<?php

namespace App\Http\Controllers;

use App\Models\CholloPrueba;
use App\Models\prueba;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function inicio(){
        $chollos = prueba::all();
        return view('index', compact('chollos'));
    }

    public function editar($id) {
        $chollo = prueba::findOrFail($id);
      
        return view('chollo.editar', compact('chollo'));
      }
    public function registro(){
        return view('chollo.registro');
    }
      public function crear(Request $request){
          
          $chollo = new prueba();
          $request -> validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'mimes:jpg,jpeg,png',
            'imgName'=> 'required'
          ]);
          $fechaActual = date('d-m-Y');
         // $cadena =str_replace(' ', '', $fechaActual);
        $chollo -> nombre = $request ->nombre;
        $chollo -> descripcion = $request ->descripcion;
        if($request->hasFile("imagen")){
            $nomImg = $request->imgName;
            $imagen = $request->file("imagen");
            $nombreimagen =  /*$cadena.*/$nomImg.".".$imagen->guessExtension();
            $ruta = public_path("assets/img/");
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            $chollo->imagen = $nombreimagen;            
            
        }
        $chollo->save();
        
        return back() -> with('mensaje','Nota agregada exitósamente');
      }
    public function actualizar(Request $request, $id){
        $request -> validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);
      
        $notaActualizar = prueba::findOrFail($id);
      
        $notaActualizar -> nombre = $request -> nombre;
        $notaActualizar -> descripcion = $request -> descripcion;
      
        $notaActualizar -> save();
      
        return back() -> with('mensaje', 'Chollo actualizado');
    }

    public function eliminar($id) {
        $cholloEliminar = prueba::findOrFail($id);
        $cholloEliminar -> delete();
      
        return back() -> with('mensaje', 'Nota Eliminada');
    }

    public function individual($id){
        $chollo = prueba::findorFail($id);
        return view('chollo.individual', compact('chollo'));
    }
}
