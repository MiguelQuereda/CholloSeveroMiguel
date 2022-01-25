@extends('plantilla')
@section('titulo')
    Crear nuevo chollo
@endsection
@section('desc')
@if (session('mensaje'))
  <div class="mensaje-nota-creada">
      {{ session('mensaje') }}
  </div>
@endif
<form action="{{route('chollo.crear')}}" enctype="multipart/form-data" method="POST">
    @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}
    
<input
      type="text"
      name="nombre"
      class="form-control mb-2"
      value=""
      placeholder="Nombre del chollo"
      autofocus
      required
  >
  <input
      type="text"
      name="descripcion"
      placeholder="Descripción del chollo"
      class="form-control mb-2"
      value=""
      required
  >
  <input type="file" name="imagen">
  <input type="text" placeholder="Nombre de la imagen" name="imgName" required><br>
  <button type="submit">Subir un nuevo chollo</button>
</form>
@endsection