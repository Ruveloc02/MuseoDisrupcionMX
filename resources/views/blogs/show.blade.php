@extends('layouts.app')

@section('botones')

@endsection

@section('content') 

    <article class="contenido-receta mostrar-obras">
        <h1 class="text-center mb-4 text-primary font-weight-bold">{{$blog->titulo}}</h1>

        <div class="imagen-receta d-flex justify-content-center">
            <img src="https://disrupcionmxdata.sfo3.digitaloceanspaces.com/{{$blog->portada}}" alt="" class="w-75 mb-3">
        </div>

        <div class="receta-meta fuente-obra">
            <p>
                <span class="font-weight-bold text-primary">Autor: </span>
                {{$blog->autor}}
            </p>
            <p>
                {!!$blog->contenido!!}
            </p>

        </div>
    </article>

@endsection