<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use App\Models\Blog;
use Illuminate\Http\Request;

class ObraController extends Controller
{
    //
    public function index()
    {
        $todas = Receta::get();
        $blogs = Blog::get();
        return view('obras.obras', compact('todas'), compact('blogs'));
    }
}
