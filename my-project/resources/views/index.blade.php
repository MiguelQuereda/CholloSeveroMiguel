@extends('plantilla')
@section('titulo')
    Inicio
@endsection
@section('desc')
    <h2>Mira nuestros chollos, disfruta y comparte</h2>
@endsection
@section('total')

<h2>Lista de chollos</h2>
<div class="container contenechollos">
    @foreach ($chollos as $chollo)
    <div class="container chollito">
        <div class="imagen">
            <img src="{{asset('assets/img/'.$chollo->imagen)}}">
            {{-- <p></p> --}}
            {{-- Aquí lo que hacemos es accedemos al objeto chollo, llamamos a la fucnion categorias y cogemos el campo categoria --}}
        </div>
        <div class="texto">
        <h4><a href="{{ route('chollo.individual', $chollo->id) }}">{{$chollo->nombre}}</a></h4>  
        <p>{{$chollo->precio_descuento}} €</p>
        <a href="{{ route('chollo.editar', $chollo->id) }}" class="btn btn-warning btn-sm">
            Editar
          </a>
          <form action="{{ route('chollo.eliminar', $chollo->id) }}" method="POST" class="d-inline">
            @method('DELETE')
            @csrf
          
            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
          </form></div>
        </div>
        @endforeach

    </div>
    <div class="manejadores">
    {{-- {{ $chollos->links()}} --}}
    </div>
        <div class="boton"><a href="{{ route('chollo.registro') }}" class=".text-white">
            Crear un nuevo chollo</a>
</div>
@endsection