@extends('paginaPrincipal')
@section('content') 
    @if ($casa===null)
      <div class="bg-light  d-flex flex-wrap justify-content-center">
        <div class="card bg-dark text-white col-8 mt-5 mb-5">
            <div  id="" class="row">
                <div id="" class="col-md-4">
                    <img src="\Storage\notFound.png"  width="100%">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">¿No tienes casa todavía?</h5>
                        <p class="card-text">Es necesario que vincules una casa para que así los demas puedan verla y apuntarse.</p>
                        <div id="cajaFormulario" class="text-dark ">
                            <form action={{ route('agregarCasa')}} method="POST" id="formulario" class='text-center' enctype="multipart/form-data">
                              @csrf
                              
                            </form>
                            <button id="botonBorrar" class="btn btn-light">Vincular casa.</button>
                          
                        </div>
                    </div>
                </div>
                <div class='col'></div>
                
            </div>
        </div>
      </div>
      <script src="{{ asset('/js/formularioRegistroCasa.js') }}"></script>
    @else
      <div class="bg-light  d-flex flex-wrap justify-content-center">
        <div class="card bg-dark text-white col-8 mt-5 mb-5">
          <div  id="" class="row">
            <div id="" class="col-md-4">
              <img src="\Storage\imgCasas\{{$casa->imagen}}"  width="100%">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{$casa->direccion}}</h5>
                <p class="card-text">{{$casa->descripcion}}</p>
                <div id="cajaFormulario" class="text-white">
                  <button id="botonAnadir" class="btn btn-primary">EDITAR</button>
                </div>
              </div>
            </div>   
          </div>
        </div>
      </div>
      <script src="{{ asset('/js/edicionCasa.js') }}"></script>
    @endif
@endsection
    
    