@extends('plantilla')
@section('titulo')
    Editando
@endsection
@section('desc')
<h2>Editando la nota {{ $chollo -> id }}</h2>

@if (session('mensaje'))
  <div class="alert alert-success">{{ session('mensaje')}}</div>
@endif

<form action="{{ route('chollo.actualizar', $chollo -> id) }}" method="POST">
  @method('PUT') {{-- Necesitamos cambiar al método PUT para editar --}}
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
      value="{{ $chollo ->nombre }}"
      placeholder="Nombre del chollo"
      autofocus
      required
  >
  <input
      type="text"
      name="descripcion"
      placeholder="Descripción del chollo"
      class="form-control mb-2"
      value="{{ $chollo ->descripcion }}"
      required
  >
  <input
      type="text"
      name="url"
      class="form-control mb-2"
      value="{{ $chollo ->url }}"
      placeholder="Url del chollo"
      autofocus
      required
  >
  <input
      type="text"
      name="categoria"
      placeholder="Categoría del chollo"
      class="form-control mb-2"
      value="{{ $chollo ->categoria }}"
      required
  >
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
      value="{{ $chollo ->puntuacion }}"
      required
  >
  <input
  type="number"
  name="precio"
  placeholder="Precio del chollo sin descuento"
  class="form-control mb-2"
  value="{{ $chollo ->precio }}"
  required
>
<input
type="number"
name="precio_descuento"
placeholder="Precio del chollo con descuento"
class="form-control mb-2"
value="{{ $chollo ->precio_descuento }}"
required
>
  <input type="file" name="imagen">

  <button class="btn btn-primary btn-block" type="submit" value="Editar">Guardar cambios</button>
</form>
@endsection