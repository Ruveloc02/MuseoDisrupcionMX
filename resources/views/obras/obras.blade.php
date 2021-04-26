@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<div class="container nuevas-recetas">
    <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Obras Publicadas</h2>
    <div class="row">
        @foreach($todas as $nueva)
        <div class="tarjeta mr-4 mb-4">
            <div style="grid-area: imagen;
            background: url('https://disrupcionmxdata.sfo3.digitaloceanspaces.com/{{$receta->imagen}}');
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;">
                
            </div>
            <a href="{{route('recetas.show', ['receta' => $nueva->id])}}" class="text-decoration-none text-dark">
            <div class="tarjeta-texto">
                <h3>{{$nueva->titulo}}</h3>
                <h4>{{$nueva->autor}}</h4>
                <h4>{{$nueva->tipo}}</h4>
                <h4>{{$nueva->tamanio}}</h4>
                <h4>Precio: {{$nueva->precio}}</h4>
            </div>
            </a>
            <a href="{{route('recetas.show', ['receta' => $nueva->id])}}" class="btn btn-primary d-block font-weight-bold text-uppercase tarjeta-boton">Ver obra</a>
        </div>
        @endforeach
    </div>
</div>
@endsection