<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Laravel</title>
        <style>
            form{
                background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            }
            #form h1 {
                color: #0f2027;
                text-align: center;
            }
            .input-control{
                margin-left: 1em;
                margin-right: 1em;
            }
            .input-control input {
                border: 2px solid #f0f0f0;
                border-radius: 4px;
                display: block;
                font-size: 12px;
                padding: 10px;
                width: 100%;
            }
    
            .divForm{
                margin-top: 2em;
            }
            #boton{
                margin-left: 120px;
                margin-bottom: 15px;
            }
    
            .Boton{
                margin-top: 1em;
            }
            #mensajeError{
                
                
            }
        </style>
    </head>
    <body>
    
        <div class="container-fluid divForm">
            <div class="row">
                <div class="col-4">
                    <form class="rounded" id="form" action="{{ route('registrarme') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h1 class="text-white">Formulario de registro</h1>
            
                        <div class="input-control">
                            <label for="nick" class="form-label text-white">Nick</label>
                            <input id="nick" name="nick" class="form-control"/>
                        </div>
            
                        <div class="input-control">
                            <label for="nombreCompleto" class="form-label text-white">Nombre completo</label>
                            <input id="nombreCompleto" name="nombreCompleto" class="form-control"/>
                        </div>
            
                        <div class="input-control">
                            <label for="password" class="form-label text-white">Password</label>
                            <input id="password" name="password" class="form-control"/>
                        </div>
            
                        <div class="input-control">
                            <label for="Rpassword" class="form-label text-white">Repite Password</label>
                            <input id="Rpassword" name="Rpassword" class="form-control"/>
                        </div>
        
                        <div class="input-control mt-3">
                            <label for="modo" class="form-label text-white">¿Qué estás buscando?</label>
                            <select name="modo">
                                <option value="1">Estoy buscando casa</option>
                                <option value="0">Estoy buscando compañeros</option>
                            </select>
                        </div>

                        <div class="input-control">
                            <label for="correo" class="form-label text-white">Correo electrónico:</label>
                            <input id="correo" name="correo" class="form-control"/>
                        </div>
            
                        <div class="input-control">
                            <label for="imagen" class="form-label text-white">Foto de perfil:</label>
                            <input type="file" id="imagen" name="imagen" class="form-control"/>
                        </div>
            
                        <div class="Boton">
                            <button id="boton"  class="btn btn-success w-50" type='submit'>Registrarse</button> 
                        </div>
                    </form>
                </div>
                <div id="mensajeError" class="col-6">
                @if(isset($error))
                    <p class="alert alert-danger">{{$error}}</p>
                @endif
                </div>
            </div>
            
            
        </div>  
        <script src="{{ asset('js/validacionFormularioRegistro.js') }}"></script>
    </body>
</html>