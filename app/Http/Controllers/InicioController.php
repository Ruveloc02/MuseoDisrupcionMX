<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Receta;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    //
    public function index(){

        $obras = Receta::latest()->take(3)->get();
        $blogs = Blog::latest()->take(3)->get();
        return view('inicio.index', compact('obras'), compact('blogs'));
    }

    
}
