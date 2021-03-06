<?php

namespace App\Http\Controllers;

use App\Models\CholloSevero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function inicio(){
        //$chollos = CholloSevero::all();
        $chollos= CholloSevero::paginate();
        return view('index', compact('chollos'));
    }


    public function novedades(){
        $chollos = CholloSevero::all();
        //$chollos = CholloSevero::orderBy('id', 'desc')->get();
        return view('index', compact('chollos'));
        
    }
    public function populares(){
        $chollos = CholloSevero::orderBy('puntuacion', 'desc')->get();
        return view('index', compact('chollos'));
    }


    /*public function editar($id) {
        $chollo = CholloSevero::findOrFail($id);
      
        return view('chollo.editar', compact('chollo'));
      }*/
    public function registro(){
        return view('chollo.registro');
    }
      public function crear(Request $request){
          
          $chollo = new CholloSevero();
          $request -> validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'url'=>'required',
            'categoria' => 'required',
            'puntuacion' => 'required',
            'precio'=>'required',
            'precio_descuento' => 'required',
            'disponible' => 'required',
          ]);
        $chollo -> nombre = $request -> nombre;
        $chollo -> descripcion = $request -> descripcion;
        $chollo -> url = $request -> url;
        $chollo -> categoria = $request -> categoria;
        $chollo -> puntuacion = $request -> puntuacion;
        $chollo -> precio = $request -> precio;
        $chollo -> precio_descuento = $request -> precio_descuento;
        $chollo->imagen = "todavíano";
        if($chollo -> disponible == "true"){
            $respuesta = true;
        }else{
            $respuesta = false;
        }
        $chollo -> disponible = $respuesta;
      
        $chollo -> save();
        if($request->hasFile("imagen")){
            $imagen = $request->file("imagen");
            $nombreimagen =  $chollo->id."chollosevero".".".$imagen->guessExtension();
            $ruta = public_path("assets/img/");
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            $chollo->imagen = $nombreimagen;            
            
        }else{
            $chollo->imagen = "cholloImgDefault.png";
        }
        $chollo->save();
        
        return back() -> with('mensaje','Chollo agregado exitósamente');
      }
      /*
    public function actualizar(Request $request, $id){
        $request -> validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'url'=>'required',
            'categoria' => 'required',
            'puntuacion' => 'required',
            'precio'=>'required',
            'precio_descuento' => 'required',
            'disponible' => 'required',
        ]);
      
        $cholloActualizar = CholloSevero::findOrFail($id);
      
        $cholloActualizar -> nombre = $request -> nombre;
        $cholloActualizar -> descripcion = $request -> descripcion;
        $cholloActualizar -> url = $request -> url;
        $cholloActualizar -> categoria = $request -> categoria;
        $cholloActualizar -> puntuacion = $request -> puntuacion;
        $cholloActualizar -> precio = $request -> precio;
        $cholloActualizar -> precio_descuento = $request -> precio_descuento;
        if($cholloActualizar -> disponible == "true"){
            $respuesta = true;
        }else{
            $respuesta = false;
        }
        $cholloActualizar -> disponible = $respuesta;
      
        $cholloActualizar -> save();
        if($request->hasFile("imagen")){
            $imagen = $request->file("imagen");
            $nombreimagen =  $cholloActualizar->id."chollosevero".".".$imagen->guessExtension();
            $ruta = public_path("assets/img/");
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            $cholloActualizar->imagen = $nombreimagen;            
            
        }
        $cholloActualizar->save();
      
        return back() -> with('mensaje', 'Chollo actualizado');
    }

    public function eliminar($id) {
        $cholloEliminar = CholloSevero::findOrFail($id);
        $cholloEliminar -> delete();
      
        return back() -> with('mensaje', 'Nota Eliminada');
    }*/

    public function individual($id){
        $chollo = CholloSevero::findorFail($id);
        return view('chollo.individual', compact('chollo'));
    }

    public function devolverBoolean($valor){

        if($valor == "true"){
            return true;
        }else{
            return false;
        }
    }
}


