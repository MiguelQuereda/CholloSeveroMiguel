@extends('plantilla')
@section('titulo')
    Inicio
@endsection
@section('desc')
    <h2>Mira nuestros chollos, disfruta y comparte</h2>
@endsection
@section('total')
<table>
    <thead>
    <tr><th>Nombres</th><th>Descripciones</th></tr>
</thead>
<tbody>
    @foreach ($chollos as $chollo)
    <tr>
        <td><a href="{{ route('chollo.individual', $chollo->id) }}">  {{$chollo->nombre}}</a></td>
        <td>{{$chollo->descripcion}}</td>
        <td><a href="{{ route('chollo.editar', $chollo->id) }}" class="btn btn-warning btn-sm">
            Editar
          </a></td>
          <td><form action="{{ route('chollo.eliminar', $chollo->id) }}" method="POST" class="d-inline">
            @method('DELETE')
            @csrf
          
            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
          </form></td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection