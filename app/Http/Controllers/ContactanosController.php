<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    //
    public function index(){
        return view('contactanos.index');
    }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required',
        ]);

        $correo = new ContactanosMailable($request->all());
        Mail::to('carlos.ruizvelasco.lopez@gmail.com')->send($correo);

    return redirect()->route('inicio.index')->with('info', 'Mensaje enviado');
    }
}
