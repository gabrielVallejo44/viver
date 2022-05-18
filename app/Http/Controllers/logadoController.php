<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuario;
use App\Models\imagenesUsuario;
use App\Models\casa;
class logadoController extends Controller
{
    public function registrarme(Request $request){
        $usuarioAux = usuario::where('nick', $request->nick)->first();
        if($usuarioAux!=null){
            $error="Usuario ya registrado en nuestra base de datos.";
            return view('formularioRegistro', ['error'=>$error]);
        }
        $usuario=new usuario;
        $usuario->nick=$request->nick;
        $usuario->name=$request->nombreCompleto;
        $usuario->password=$request->password;
        $usuario->correo=$request->correo;
        $usuario->modo=$request->modo;
        $usuario->tipo="1";
        $usuario->caracteristicas="";
        $usuario->libre=true;
        $usuario->save();
        if($request->hasFile('imagen')){
            $imagen=$request->file('imagen');
            $imagenesUsuario = new imagenesUsuario();
            $imagenesUsuario->id_usuario = $usuario->id;
            $imagenesUsuario->imagen = time() . '-' . $imagen->getClientOriginalName();
            $destino='storage/imagenes_usuario/';
            $upload=$request->file('imagen')->move($destino, $imagenesUsuario->imagen);
            $imagenesUsuario->save();

        }
        return view('welcome');
    }
    public function logarme(Request $request){
        $usuarioAux = usuario::where('nick', $request->nick)->first();
        
        if($usuarioAux==null){
            return view('welcome');
        }else{
            session_start();
            $imagenPerfil=imagenesUsuario::where('id_usuario', $usuarioAux->id)->first();
            $usuario=new usuario;
            $usuario->id=$usuarioAux->id;
            $usuario->nick=$usuarioAux->nick;
            $usuario->name=$usuarioAux->name;
            $usuario->password=$usuarioAux->password;
            $usuario->correo=$usuarioAux->correo;
            $usuario->modo=$usuarioAux->modo;
            $usuario->tipo=$usuarioAux->tipo;
            session(['usuario' => $usuario]);
            session(['imagenPerfil' => $imagenPerfil->imagen]);
            if($usuario->tipo=="0"){ //ES UN ADMINISTRADOR
                $usuariosAdmin=self::sacarCompañeros();
                $casasAdmin=self::sacarCasas();
                //SACAR TODAS LAS PETICIONES
                session(['usuariosAdmin' => $usuariosAdmin]);
                session(['casasAdmin' => $casasAdmin]);
                return view('admin.usuariosAdmin');
            }else{ //ES UN USUARIO
                if ($usuario->modo=="0") { //BUSCA COMPAÑEROS
                    $compañeros=self::sacarCompañeros();
                    $miCasa=self::miCasa($usuario->id);
                    session(['miCasa' => $miCasa]);
                    session(['compañeros'=>$compañeros]);
                    return view('usuario.usuarioBuscaCompañeros');
                    
                } else { //BUSCA CASA
                    $casas=self::sacarCasas();
                    session(['casas'=>$casas]);
                    return view('usuario.usuarioBuscaCasa');
                }
            }           
        }
    }
    public function sacarCompañeros(){
        $compañeros = array();
        $compañerosAux = usuario::where('modo', '1')->get();
        foreach ($compañerosAux as $compañeroAux) {
            $compañero=new usuario;
            $compañero->id=$compañeroAux->id;
            $compañero->nick=$compañeroAux->nick;
            $compañero->name=$compañeroAux->name;
            $compañero->password=$compañeroAux->password;
            $compañero->caracteristicas=$compañeroAux->caracteristicas;
            $compañero->correo=$compañeroAux->correo;
            $compañero->modo=$compañeroAux->modo;
            $compañero->tipo=$compañeroAux->tipo;
            array_push($compañeros,$compañero); 
        }
        return $compañeros;
    }
    public function sacarCasas(){
        $casasAux = casa::where('lleno', '0')->get();
                $casas = array();
                foreach ($casasAux as $casaAux) {
                    $casa=new casa;
                    $casa->id=$casaAux->id;
                    $casa->nombre=$casaAux->nombre;
                    $casa->propietario=$casaAux->propietario;
                    $casa->direccion=$casaAux->direccion;
                    $casa->localidad=$casaAux->localidad;
                    $casa->aforoActual=$casaAux->aforoActual;
                    $casa->aforo=$casaAux->aforo;
                    $casa->lleno=$casaAux->lleno;
                    array_push($casas,$casa); 
                }
        return $casas;
    }
    public function miCasa($id){
        $casaAux = casa::where('propietario', $id)->get();
        if($casaAux->count()>0){
            $miCasa=new casa;
            $miCasa=$casaAux;
            
            return $miCasa;
        }else{
            return null;
        }
        
    }
    public function sacarUsuariosAdmin(){

    }
    public function sacarCasasAdmin(){

    }
    public function cerrarSesion(Request $request){
        $usuarioActual=session('usuario');
        $usuarioCerrar=decrypt($request->usuarioCerrar);
        if($usuarioActual->id==$usuarioCerrar->id){
            session_unset();
            //session_destroy();
            return view('welcome');
        }
    }
}