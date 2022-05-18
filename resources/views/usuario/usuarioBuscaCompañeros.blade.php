@extends('paginaPrincipal')
@php
$usuario=session('usuario');
$miCasa=session('miCasa');
$compañeros=session('compañeros');
@endphp
@section('content')
    @if ($miCasa===null)
        <div class="container my-4">
             <div class="row mt-5 ">
                <div class="col-12">
                    <h4>Hola Viver!!!</h4>
                    <h3>Necesitas tener una casa asociada para empezar a buscar compañerooos</h3>
                </div>
            </div> 
            
        </div>
    @else
        <div class="container my-4">

            <div id="usuarios" class="carousel slide" data-bs-ride="carousel" >
                
                <div class="carousel-inner">
                    @forelse ($compañeros as $compañero)
                    
                        <div class="carousel-item bg-dark text-white @if ($loop->index==0) active @endif">
                            <div class="card bg-dark text-white">
                                <div class="row">
                                    <div id="cajaImagenCandidato" class="col-3">
                                        <img src="\Storage\imgUsuario\{{$compañero}}"  width="100%">
                                    </div>
                                    <div class="card-body col-6">
                                        <h5 class="card-title">{{$compañero->nick}}</h5>
                                        <a href="{{route('agregarPeticion', ['receptor'=>encrypt($compañero->id)])}}" class="btn btn-success">Enviar petición</a>
                                    </div>
                                    <div class="col-3">
                                        <p>Características: {{$compañero->caracteristicas}}</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    @empty
                        
                    @endforelse
                </div>   
                <a class="carousel-control-prev" href="#usuarios" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    
                </a>
                <a class="carousel-control-next" href="#usuarios" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    
                </a>
            </div>
            
            
        </div>
    @endif
        
        

@endsection