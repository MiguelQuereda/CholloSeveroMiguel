@extends('plantilla')
@section('titulo')
    {{$chollo->id}}
@endsection
@section('desc')
<section class="container">
    
    <div class="row cont">
        <div class="img col-6">
            <img src="{{asset('assets/img/'.$chollo->imagen)}}">
            @if ($chollo->disponible == 0)
           <div class="col-12 btn btn-primary btn-sm boton"><a href="{{$chollo->url}}"> Ir al chollo</a></div>
           @else
           <div class="col-12 btn btn-primary btn-sm" disabled>Ya no está disponible</div>
           @endif
        </div>
        <div class="col-6 txt">
           <div class="col-12 puntuacion"><h3> + {{$chollo->puntuacion}}º</h3></div>
           <div class="col-12 nombre"><h2>{{$chollo->nombre}}</h2></div>
           <div class="col-12 nombre"><h3>{{$chollo->User->name}}</h3></div>
           <div class="col-12 descripcion"><p>{{$chollo->descripcion}}</p></div>

           <div class="precio">
            <p>{{$chollo->precio_descuento}} €</p>
           </div>
           
        </div>
    </div>
</section>
@endsection