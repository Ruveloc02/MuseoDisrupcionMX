@extends('layouts.app')

@section('styles')

@endsection

@section('content')
    <div class="container nuevas-recetas">

        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">¿Que es DisrupciónMX?</h2>

            
        <div class="contenedor-grid">

            <div class="parte-grid-img imagen-nosotros">
                <img src="{{ asset('favico/fav.png') }}"  alt="" width="200">
            </div>

            <div class="parte-grid">
                <h4>
                    Un espacio para el criptoarte<br>
                    donde creadores, compradores<br>
                    e inversionistas se unen gracias
                    al blockchain.
                </h4>
            </div>


            <div class="parte-grid-tres">
                <h4>
                    La disrupción del arte a través de blockchain.
                    Una nueva forma de comercializar arte
                    de manera segura, sin intermediarios
                    y garantizando la autenticidad del autor.
                    <br>
                    <br>
                    <a href="{{route('nosotros.index')}}">
                        <span>El futuro de poseer arte es digital</span>
                    </a>
                </h4>
            </div>
        </div>
        
    </div>

    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Últimas obras</h2>
        <a href="{{route('obras.index')}}" class="btn btn-primary text-uppercase ml-5 p-2 px-4 ver-todas">Ver Todas</a>
        <div class="row">
            @foreach($obras as $obra)
            <div class="tarjeta mr-4">
                <div style="grid-area: imagen;
                background: url('https://disrupcionmxdata.sfo3.digitaloceanspaces.com/{{$obra->imagen}}');
                border-top-left-radius: 15px;
                border-top-right-radius: 15px;
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;">
                    
                </div>
                <a href="{{route('recetas.show', ['receta' => $obra->id])}}" class="text-decoration-none text-dark">
                <div class="tarjeta-texto">
                    <h3>{{$obra->titulo}}</h3>
                    <h4>{{$obra->autor}}</h4>
                    <h4>{{$obra->tipo}}</h4>
                    <h4>{{$obra->tamanio}}</h4>
                    <h4>Precio: {{$obra->precio}}</h4>
                </div>
                </a>
                <a href="{{route('recetas.show', ['receta' => $obra->id])}}" class="btn btn-primary d-block font-weight-bold text-uppercase tarjeta-boton">Ver obra</a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container nuevas-recetas">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Nuestros Blogs</h2>
        <a href="{{route('blogs.index')}}" class="btn btn-primary text-uppercase ml-5 p-2 px-4 ver-todas">Ver entradas</a>
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

    <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Déjanos un mensaje</h2>
    <section>
        <form action="{{route('contactanos.store')}}" class="formulario" method="POST">
    
            @csrf
    
            <fieldset>
                <legend>Contáctanos llenando todos los campos</legend>
    
                <div class="contenedor-campos">
                    <div class="campo">
                        <label for="nombre">Nombre</label>
                        <input type="text" placeholder="Escribe tu nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" id="nombre" value="{{old('nombre')}}">
    
                        @error('nombre')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <div class="campo">
                        <label for="telefono">Telefono</label>
                        <input type="number" placeholder="Escribe tu telefono" name="telefono" class="form-control" id="telefono" value="{{old('telefono')}}">
                    </div>
    
                    <div class="campo">
                        <label for="correo">Correo</label>
                        <input type="email" placeholder="Escribe tu correo electronico" name="correo" class="form-control @error('correo') is-invalid @enderror" id="correo" value="{{old('correo')}}">
    
                        @error('correo')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
    
                    <div class="campo">
                        <label for="mensaje">Mensaje</label>
                        <textarea cols="30" rows="10" name="mensaje" class="form-control @error('mensaje') is-invalid @enderror" id="mensaje" value="{{old('mensaje')}}"></textarea>
    
                        @error('mensaje')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="alinear-derecha flex">
                    <formulario-contacto></formulario-contacto>
                </div>
            </fieldset>
        </form>
        
    </section>
@endsection

