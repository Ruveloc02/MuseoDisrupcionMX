<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
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
        //
        $blogs = Blog::get();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("blogs.create");
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
        $data = request()->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'portada' => 'required|image',
            'contenido' => 'required',
        ]);

        $extension = $request->file('portada')->extension();
        $rutaImagen = Storage::disk('s3')->putFileAs('images', $request->file('portada'),time().'.'.$extension,'public');


        //Almacenar en la base de datos con un modelo
        auth()->user()->blogs()->create([
            'titulo' => $data['titulo'],
            'autor' => $data['autor'],
            'contenido' => $data['contenido'],
            'portada' => $rutaImagen, 
        ]);

        //Redireccionar
        return redirect()->action('App\\Http\\Controllers\\RecetaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
        return view("blogs.show", compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
        return view("blogs.edit", compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
        
        //Validación
        $data = request()->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'contenido' => 'required',
        ]);

        $blog->titulo = $data['titulo'];
        $blog->autor = $data['autor'];
        $blog->contenido = $data['contenido'];

        if(request('imagen')){
            $extension = $request->file('portada')->extension();
            $rutaImagen = Storage::disk('s3')->putFileAs('images', $request->file('portada'),time().'.'.$extension,'public');

            $blog->imagen = $rutaImagen;
        }

        $blog->save();

        //Redireccionar
        return redirect()->action('App\\Http\\Controllers\\RecetaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
        //
        $blog->delete();

        return redirect()->action('App\\Http\\Controllers\\RecetaController@index');
    }
}
