@extends('paginaPrincipal')
@php
$usuario=session('usuario');
$casas=session('casas');
@endphp
@section('content') 
    <div class="bg-light">
        <div class="container my-4">

            <div id="casas" class="carousel slide " data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($casas as $casa)
                        <div class="carousel-item active">
                            <div class="card bg-dark text-white m-width-100">
                                <div class="row">
                                    <div id="cajaImagenCandidato" class="col-md-4">
                                        <img src="img/avatar.png"  width="100%">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$casa->nombre}}</h5>
                                            <p class="card-text">{{$casa->direccion}}</p>
                                            {{-- <form action="{{ route('casaDetalles', [$casa]) }}" method="GET">
                                                @csrf
                                                <button class="btn btn-danger btn-sm">Ver más</button>
                                            </form> --}}
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                            
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#casas" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    
                </a>
                <a class="carousel-control-next" href="#casas" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    
                </a>
            </div>
        
        </div>
    </div>
    
    <!--<script src= "{ {asset('js/usuarioBuscaCasa.js') }}"></script>-->
@endsection