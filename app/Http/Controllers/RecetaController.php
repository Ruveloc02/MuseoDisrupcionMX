<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class RecetaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = auth()->user()->id;
        //Recetas con paginación 
        $recetas = Receta::where('user_id', $usuario)->simplePaginate(3);
        $blogs = Blog::where('user_id', $usuario)->simplePaginate(3);


        //$recetas = Auth::user()->recetas;
        return view('recetas.index', compact('recetas',$recetas), compact('blogs',$blogs));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("recetas.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request['imagen']->store('upload-obras', 'public'));
        $data = request()->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'tipo' => 'required',
            'tamanio' => 'required',
            'precio' => 'required',
            'imagen' => 'required|image',
            'urlCompra' => 'required',
        ]);

        //$rutaImagen = $request['imagen']->store('upload-obras', 'public');

        //$rutaImagen = request()->file('imagen')->store(
        //    'images',
        //    's3'
        //);
        
        $extension = $request->file('imagen')->extension();
        $rutaImagen = Storage::disk('s3')->putFileAs('images', $request->file('imagen'),time().'.'.$extension,'public');

        //$img = Image::make(public_path("storage/{$rutaImagen}"));
        //$img->save();

        /*
        DB::table('recetas')->insert([
            'titulo' => $data['titulo'],
            'autor' => $data['autor'],
            'tipo' => $data['tipo'],
            'tamanio' => $data['tamanio'],
            'precio' => $data['precio'],
            'user_id' => Auth::user()->id,
            'imagen' => $rutaImagen,
        ]);
        */

        //Almacenar en la base de datos con un modelo
        auth()->user()->recetas()->create([
            'titulo' => $data['titulo'],
            'autor' => $data['autor'],
            'tipo' => $data['tipo'],
            'tamanio' => $data['tamanio'],
            'precio' => $data['precio'],
            'urlCompra' => $data['urlCompra'],
            'imagen' => $rutaImagen, 
        ]);

        //Redireccionar
        return redirect()->action('App\\Http\\Controllers\\RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //
        return view("recetas.show", compact('receta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
        return view("recetas.edit", compact('receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //Revisar el policy
        $this->authorize('update', $receta);
        //Validación
        $data = request()->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'tipo' => 'required',
            'tamanio' => 'required',
            'precio' => 'required',
            'urlCompra' => 'required',
        ]);

        $receta->titulo = $data['titulo'];
        $receta->autor = $data['autor'];
        $receta->tipo = $data['tipo'];
        $receta->tamanio = $data['tamanio'];
        $receta->precio = $data['precio'];
        $receta->urlCompra = $data['urlCompra'];

        if(request('imagen')){
            $rutaImagen = $request['imagen']->store('upload-obras', 'public');
        
            $img = Image::make(public_path("storage/{$rutaImagen}"));
            $img->save();

            $receta->imagen = $rutaImagen;
        }

        $receta->save();

        //Redireccionar
        return redirect()->action('App\\Http\\Controllers\\RecetaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {

        $this->authorize('delete', $receta);
        //
        $receta->delete();

        return redirect()->action('App\\Http\\Controllers\\RecetaController@index');
    }
}
