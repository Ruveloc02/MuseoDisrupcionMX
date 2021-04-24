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
                    <span>El futuro de poseer arte es digital</span>
                </h4>
            </div>
        </div>

        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">¿Cómo funciona?</h2>
        <div class="contenedor-grid-funcion">
            <div class="contenedor-grid-funcion-div">
                <img src="{{ asset('images/block.png') }}"  alt="" width="100">
                <h4>La obra se digitaliza en blockchain  para garantizar su autenticidad</h4>
            </div>
                
            <div class="contenedor-grid-funcion-div">
                <img src="{{ asset('images/candado.png') }}"  alt="" width="100">
                <h4>El registro permanece inmutable.</h4>
            </div>
                
            <div class="contenedor-grid-funcion-div">
                <img src="{{ asset('images/historial.png') }}"  alt="" width="100">
                <h4>Puedes ver el historial de las transacciones de la obra.</h4>
            </div>

            <div class="contenedor-grid-funcion-div">
                <img src="{{ asset('images/huella.png') }}"  alt="" width="100">
                <h4>La compra-venta se realiza al momento.</h4>
            </div>

        </div>

        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">¿Para qué?</h2>
        <div class="contenedor-grid-funcion">
            <div class="contenedor-grid-funcion-div-1 contenedor-grid-funcion-div">
                <img src="{{ asset('images/balanza.png') }}"  alt="" width="100">
                <h4>Haciendo el mercado del arte más accesible</h4>
            </div>
                
            <div class="contenedor-grid-funcion-div">
                <img src="{{ asset('images/artist.png') }}"  alt="" width="100">
                <h4>Los artistas cuentan con más oportunidades de comercializar sus obras.</h4>
            </div>
                
            <div class="contenedor-grid-funcion-div">
                <img src="{{ asset('images/trade.png') }}"  alt="" width="100">
                <h4>Se eliminan intermediarios conectando artistas y compradores.</h4>
            </div>

        </div>

        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">¿Qué hacer?</h2>
        <div class="contenedor-grid-funcion contenedor-grid-que">
            <div class="contenedor-grid-funcion-div">
                <img src="{{ asset('images/galeria.png') }}"  alt="" width="100">
                <h4>Visita nuestra <a href="{{route('obras.index')}}" class="fecha font-weight-bold">galería.</a></h4>
            </div>
                
            <div class="contenedor-grid-funcion-div">
                <img src="{{ asset('images/wallet.png') }}"  alt="" width="100">
                <h4>Conecta tu wallet metamask.</h4>
            </div>
                
            <div class="contenedor-grid-funcion-div">
                <img src="{{ asset('images/carrito.png') }}"  alt="" width="100">
                <h4>Elige comprar.</h4>
            </div>
        </div>

        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">¿No tienes una wallet?</h2>
        <div class="container video-responsive">
            <h3 class="mb-3 fecha font-weight-bold">Mira este tutorial</h4>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/12tjL6Jk0uM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

    </div>
@endsection