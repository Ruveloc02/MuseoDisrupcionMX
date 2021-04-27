@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<div class="container nuevas-recetas">
    <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Blog Publicados</h2>
    <div class="row">
        @foreach($blogs as $blog)
        <div class="tarjeta mr-4">
            <div style="grid-area: imagen;
            background: url('https://disrupcionmxdata.sfo3.digitaloceanspaces.com/{{$blog->portada}}');
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;">
                
            </div>
            <a href="{{route('blogs.show', ['blog' => $blog->id])}}" class="text-decoration-none text-dark">
            <div class="tarjeta-texto">
                <h3>{{$blog->titulo}}</h3>
                <h4>{{$blog->autor}}</h4>
                <h4>{{ Str::words( strip_tags( $blog->contenido ), 10) }}</h4>
                
            </div>
            </a>
            <a href="{{route('blogs.show', ['blog' => $blog->id])}}" class="btn btn-primary d-block font-weight-bold text-uppercase tarjeta-boton">Ver entrada</a>
        </div>
        @endforeach
    </div>
</div>
@endsection