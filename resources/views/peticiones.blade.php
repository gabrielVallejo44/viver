@extends('paginaPrincipal')
@php
    $peticiones=session('peticiones');
@endphp
@section('content') 
<style>
    .card{
        position: relative;
        width: 300px;
        height: 350px;
    }
    .card .face{
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        border-radius: 10px;
        overflow:hidden;
        transition: .5s;
    }
    .card .front{
        transform: perspective(600px) rotateY(0deg);
        box-shadow: 0 5px 10px #000;
    }
    .card .front img{
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .card .front h3{
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 45%;
        line-height: 45px;
        color: #fff;
        background: rgba(0, 0, 0, .4);
        text-align: center;
    }
    .card .back{
        transform: perspective(600px) rotateY(180deg);
        background: rgb(3, 35, 54);
        padding: 15px;
        color: #f3f3f3;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        text-align: center;
        box-shadow: 0 5px 10px #000
    }
    .card .back .link{
        border-top: solid 1px #f3f3f3;
        height: 50px;
        line-height: 50px;
    }
    .card .back .link a{
        color: #f3f3f3;
    }
    .card .back h3{
        font-size: 30px;
        margin-top: 20px;
        letter-spacing: 2px;
    }
    .card .back p{
        letter-spacing: 1px;
    }
    .card:hover .front{
        transform: perspective(600px) rotateY(180deg);
    }
    .card:hover .back{
        transform: perspective(600px) rotateY(360deg);
    }
</style>
    <div class="bg-light">
        <div class="container my-4">
                @foreach ($peticiones as $peticion)
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 h-25">
                        <div class="card ">
                            <div class="face front">
                                <img src="Storage/peticion1.jpg" />
                                <h3>{{$peticion->mensaje}}</h3>
                            </div>
                            <div class="face back">
                                <h3>Nombre</h3>
                                <p>Aqui llamo al controlador para mostrar los datos del usuario</p>
                                <div class="links">
                                    <a href="#">Aceptar</a>
                                    <a href="#">Rechazar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                @endforeach
        </div>
    </div>



@endsection