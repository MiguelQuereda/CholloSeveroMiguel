@extends('plantilla')
@section('titulo')
    Inicio - REST
@endsection
@section('desc')
    <h2>Mira nuestros chollos, disfruta y comparte</h2>
@endsection
@section('total')

<h2>Lista de chollos</h2>
<div class="container contenechollos">
    @foreach ($chollos as $chollo)
    <div class="chollazo">
    <p>ID:  {{ $chollo -> id }}</p> 
    <p>Nombre:  {{ $chollo -> nombre }}</p>
    <p>Descripción:  {{ $chollo -> descripcion }}</p>  
    <hr></div>
@endforeach
@endsection