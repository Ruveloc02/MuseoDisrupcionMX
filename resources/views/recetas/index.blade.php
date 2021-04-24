@extends('layouts.app')

@section('botones')
    <a href="{{route('recetas.create')}}" class="btn btn-primary mr-2">Crear publicación</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Administrar obras</h2>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light text-center">
                <tr>
                    <th scole="col">Titulo</th>
                    <th scole="col">Autor</th>
                    <th scole="col">Precio</th>
                    <th scole="col">Formato</th>
                    <th scole="col">Acciones</th>
                    
                </tr>
            </thead>

            <tbody>
                @foreach($recetas as $receta )
                    
                <tr class="text-center">
                    <td>{{$receta->titulo}}</td>
                    <td>{{$receta->autor}}</td>
                    <td>{{$receta->precio}}</td>
                    <td>{{$receta->tipo}}</td>
                    <td class="d-flex justify-content-center">

                            <eliminar-receta receta-id={{$receta->id}}>

                            </eliminar-receta>
                        <a href="{{ route('recetas.edit', ['receta' => $receta->id]) }}" class="btn btn-dark mr-1">Editar</a>
                        <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}" class="btn btn-success mr-1">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $recetas->links() }}
    </div>







    <a href="{{route('blogs.create')}}" class="btn btn-primary mr-2 mt-5">Crear entrada de blog</a>
    
    <h2 class="text-center mb-5">Administrar blogs</h2>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light text-center">
                <tr>
                    <th scole="col">Titulo</th>
                    <th scole="col">Autor</th>
                    <th scole="col">Acciones</th>
                    
                </tr>
            </thead>

            <tbody>
                @foreach($blogs as $blog )
                    
                <tr class="text-center">
                    <td>{{$blog->titulo}}</td>
                    <td>{{$blog->autor}}</td>
                    <td class="d-flex justify-content-center">

                            <eliminar-blog blog-id={{$blog->id}}>

                            </eliminar-blog>
                        <a href="{{ route('blogs.edit', ['blog' => $blog->id]) }}" class="btn btn-dark mr-1">Editar</a>
                        <a href="{{ route('blogs.show', ['blog' => $blog->id]) }}" class="btn btn-success mr-1">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $blogs->links() }}
    </div>

@endsection