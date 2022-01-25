@extends('plantilla')
@section('titulo')
    {{$chollo->id}}
@endsection
@section('desc')
<section class="row">
    <div class="imagen col-6 bg-gray">
        <img class="img-fluid" src="{{asset('assets/img/'.$chollo->imagen)}}">
    </div>

    <div class="col-6 texto">
        <p>{{ $chollo -> descripcion }}</p>
    </div>

</div>
@endsection