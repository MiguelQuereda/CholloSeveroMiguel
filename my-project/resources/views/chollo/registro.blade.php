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
    @error('nombre')
      <div class="alert alert-danger">
          El nombre es obligatorio
      </div>
  @enderror
  @error('descripcion')
      <div class="alert alert-danger">
          La descripción es obligatoria
      </div>
  @enderror
  @error('url')
      <div class="alert alert-danger">
          La dirección url del chollo es obligatoria
      </div>
  @enderror
  @error('categoria')
      <div class="alert alert-danger">
          La categoria del chollo es obligatoria
      </div>
  @enderror
  @error('puntuacion')
      <div class="alert alert-danger">
         La puntuación del chollo es obligatorio
      </div>
  @enderror
  @error('precio')
      <div class="alert alert-danger">
        El viejo precio del chollo es obligatorio
      </div>
  @enderror
  @error('precio_descuento')
      <div class="alert alert-danger">
          El nuevo precio del chollo es obligatorio
      </div>
  @enderror
  @error('disponible')
      <div class="alert alert-danger">
          La disponibilidad del chollo es obligatoria
      </div>
  @enderror
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
      type="hidden"
      name="id_usuario"
      class="form-control mb-2"
      value="{{ Auth::user()->id}}"
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
  <input
      type="text"
      name="url"
      class="form-control mb-2"
      value=""
      placeholder="Url del chollo"
      autofocus
      required
  >
  {{-- <select name="categorias" multiple> --}}
      {{-- Nueva incorporación y posible causa de fallos, en caso de que haya fallo, 
        también hay que ir a UserActionController, a la función registro y 
        ahí modificar para que no me devuelva categorias --}}
  @foreach ($categorias as $categoria)
  <input
  type="checkbox"
  name="categoria[]"
  
  value={{$categoria->id}}><label>{{$categoria->categoria}}</label>
  @endforeach
{{-- </select>  class="form-control mb-2"--}}
{{-- <i>Para seleccionar más de una categoría, por favor, mantener pulsado ctrl y shift (mayus) mientras escoges las</i> --}}
<br>
  {{-- <input
      type="text"
      name="categoria"
      placeholder="Categoría del chollo"
      class="form-control mb-2"
      value=""
      required > 
      --}}

  
  <select name="disponible">
    <!-- Opciones de la lista -->
    <option value="true" selected>Disponible</option>
    <option value="false">No disponible</option> <!-- Opción por defecto -->
  </select>
  <input
      type="number"
      name="puntuacion"
      placeholder="Puntuación del chollo"
      class="form-control mb-2"
      value=""
      required
  >
  <input
  type="number"
  name="precio"
  placeholder="Precio del chollo sin descuento"
  class="form-control mb-2"
  value=""
  required
  >
<input
type="number"
name="precio_descuento"
placeholder="Precio del chollo con descuento"
class="form-control mb-2"
value=""
required
>
  <input type="file" name="imagen">
<br>
  <button type="submit">Subir un nuevo chollo</button>
</form>
@endsection