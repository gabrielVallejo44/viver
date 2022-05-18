<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Laravel</title>
        <style>
          body{
            background-color: #ffe259;
            background: linear-gradient(to right, #ffa751, #ffe259)
          }
          #cajaViver{
            background-image: url(\Storage\logo.png);
            background-position: center center;
          }
        </style>
    </head>
    <body>
        <div class="container w- bg-primary  mt-5 mb-5 rounded shadow">
            <div class="row">
              <div id="cajaViver" class="col d-none d-lg-block col-md-5 col-xl-6 rounded">
                  
              </div>
              <div class="col bg-white p-5 rounded-end">
                <div class="text-end">
                  <img src="" width="95" >
                </div>
                <h2 class="fw-bold text-center py-5">Bienvenido</h2>
              
                <form id="formularioLogado" action="{{ route('logarme') }}" method="POST"> 
                    @csrf
                    
                    
                    <div class="mb-4">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input id="usuario" name="nick" class="form-control"/>
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Contraseña</label>
                    <input id="password" name="password" class="form-control"/><br>
                  </div>
                  <div class="d-grid">
                    <button id="botonFormularioLogado"  class="btn btn-primary" type='submit'>Logar</button>
                    
                  </div>
                </form>
                <div class="my-3">
                  <span>¿No tienes cuenta? <a href="{{route('registrarmeVista') }}">Regístrate</a></span><br>
                </div>
              </div>
            </div>
          </div>
        
        
    </body>
</html>