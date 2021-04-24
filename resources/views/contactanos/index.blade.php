@extends('layouts.app')

@section('styles')

@endsection

@section('content')
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