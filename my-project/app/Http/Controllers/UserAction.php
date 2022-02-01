<?php

namespace App\Http\Controllers;

use App\Models\CholloSevero;
use Illuminate\Http\Request;

class UserAction extends Controller
{
    //---------------------------------------------------
    public function __construct()
    {
        $this->middleware('auth');
    }
    /******************** ESTO LO QUE HACE ES REDIRIGIRTE A LA PAGINA DE LOGEARTE SI ENTRAS A ALGUNA DE LAS PÁGINAS EN ESTE CONTROLLER */
    
    public function editar($id) {
        $chollo = CholloSevero::findOrFail($id);
      
        return view('chollo.editar', compact('chollo'));
      }
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
    }
}
