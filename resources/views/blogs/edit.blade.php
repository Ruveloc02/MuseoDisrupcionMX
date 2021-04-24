@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha512-494Ejp/5WyoRNfh+nPLhSCQPHhcsbA5PoIGv2/FuEo+QLfW+L7JQGPdh8Qy2ZOmkF27pyYlALrxteMiKau1tyw==" crossorigin="anonymous" />
@endsection

@section('botones')
    <a href="{{route("recetas.index")}}" class="btn btn-primary mr-2">Volver</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Editar Obra: {{$blog->titulo}}</h2>


    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{route('blogs.update', ['blog' => $blog->id])}}" enctype="multipart/form-data" novalidate>
                @csrf

                @method('put')

                <div class="form-group">
                    <label for="titulo" class="font-weight-bold">Título</label>
                    <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" id="titulo" placeholder="Título de la obra" value="{{$blog->titulo}}">

                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="autor" class="font-weight-bold">Autor</label>
                    <input type="text" name="autor" class="form-control @error('autor') is-invalid @enderror" id="autor" placeholder="Autor de la obra" value="{{$blog->autor}}">

                    @error('autor')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="contenido" class="font-weight-bold">Contenido</label>
                    <input id="contenido" type="hidden" name="contenido" value="{{ $blog->contenido }}" class="form-control @error('contenido') is-invalid @enderror">
                    <trix-editor input="contenido"></trix-editor>

                    @error('contenido')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="imagen" class="font-weight-bold">Selecciona una imagen</label>

                    <input  id="imagen" 
                            type="file" 
                            class="form-control @error('imagen') is-invalid @enderror btn"
                            name="imagen"
                            >

                            <div class="mt-4">
                                <p>Imagen actual</p>
                                <img src="/storage/{{$blog->portada}}" style="width: 20rem" alt="">
                            </div>

                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Actualizar Obra">
                </div>
            </form>
        </div>
    </div>

    

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha512-wEfICgx3CX6pCmTy6go+PmYVKDdi4KHhKKz5Xx/boKOZOtG7+rrm2fP7RUR2o4m/EbPdwbKWnP05dvj4uzoclA==" crossorigin="anonymous" defer></script>
@endsection