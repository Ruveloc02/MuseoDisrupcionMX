@extends('layouts.app')

@section('botones')
    <!-- Styles <a href="{{route("recetas.index")}}" class="btn btn-primary mr-2">Volver</a> -->
@endsection

@section('content')

    <article class="contenido-receta mostrar-obras">
        <h1 class="titulo-responsive mb-4 text-primary font-weight-bold">{{$receta->titulo}}</h1>

        <div class="imagen-receta">
            <img src="https://disrupcionmxdata.sfo3.digitaloceanspaces.com/{{$receta->imagen}}" alt="" class="w-75 mb-3">
        </div>

        <div class="receta-meta fuente-obra">
            <p>
                <span class="font-weight-bold text-primary">Autor: </span>
                {{$receta->autor}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">Formato: </span>
                {{$receta->tipo}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">Tamaño: </span>
                {{$receta->tamanio}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">Precio: </span>
                {{$receta->precio}}
            </p>
            <a href="javascript:void(0);" 
                onclick= "window.open('{{ $receta->urlCompra }}', 'popup', 'top=100, left=100, width=1000, height=600, toolbar=NO, resizable=NO, Location=NO, Menubar=NO, Titlebar=No, Status=NO')"
                rel=”nofollow” class="btn btn-danger mr-1 fuente-obra">Adquiérela Aquí</a>
            </p>
        </div>
    </article>

@endsection