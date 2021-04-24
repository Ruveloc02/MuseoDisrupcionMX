@extends('layouts.app')

@section('botones')
    <a href="{{route("recetas.index")}}" class="btn btn-primary mr-2">Volver</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Editar Obra: {{$receta->titulo}}</h2>


    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action="{{route('recetas.update', ['receta' => $receta->id])}}" enctype="multipart/form-data" novalidate>
                @csrf

                @method('put')

                <div class="form-group">
                    <label for="titulo" class="font-weight-bold">Título</label>
                    <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" id="titulo" placeholder="Título de la obra" value="{{$receta->titulo}}">

                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="autor" class="font-weight-bold">Autor</label>
                    <input type="text" name="autor" class="form-control @error('autor') is-invalid @enderror" id="autor" placeholder="Autor de la obra" value="{{$receta->autor}}">

                    @error('autor')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tipo" class="font-weight-bold">Tipo Formato</label>
                    <input type="text" name="tipo" class="form-control @error('tipo') is-invalid @enderror" id="tipo" placeholder="Tipo de formato de la obra" value="{{$receta->tipo}}">

                    @error('tipo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tamanio" class="font-weight-bold">Tamaño</label>
                    <input type="text" name="tamanio" class="form-control @error('tamanio') is-invalid @enderror" id="tamanio" placeholder="Tamaño de la obra" value="{{$receta->tamanio}}">

                    @error('tamanio')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="precio" class="font-weight-bold">Precio</label>
                    <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" id="precio" placeholder="Precio de la obra" value="{{$receta->precio}}">

                    @error('precio')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="urlCompra" class="font-weight-bold">Url Compra:</label>
                    <input type="text" name="urlCompra" class="form-control @error('urlCompra') is-invalid @enderror" id="urlCompra" placeholder="Link donde comprar esta obra" value="{{$receta->urlCompra}}">

                    @error('urlCompra')
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
                                <img src="/storage/{{$receta->imagen}}" style="width: 20rem" alt="">
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