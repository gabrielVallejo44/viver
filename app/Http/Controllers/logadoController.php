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
                $usuariosAdmin=self::sacarCompa??eros();
                $casasAdmin=self::sacarCasas();
                //SACAR TODAS LAS PETICIONES
                session(['usuariosAdmin' => $usuariosAdmin]);
                session(['casasAdmin' => $casasAdmin]);
                return view('admin.usuariosAdmin');
            }else{ //ES UN USUARIO
                if ($usuario->modo=="0") { //BUSCA COMPA??EROS
                    $compa??eros=self::sacarCompa??eros();
                    $miCasa=self::miCasa($usuario->id);
                    session(['miCasa' => $miCasa]);
                    session(['compa??eros'=>$compa??eros]);
                    return view('usuario.usuarioBuscaCompa??eros');
                    
                } else { //BUSCA CASA
                    $casas=self::sacarCasas();
                    session(['casas'=>$casas]);
                    return view('usuario.usuarioBuscaCasa');
                }
            }           
        }
    }
    public function sacarCompa??eros(){
        $compa??eros = array();
        $compa??erosAux = usuario::where('modo', '1')->get();
        foreach ($compa??erosAux as $compa??eroAux) {
            $compa??ero=new usuario;
            $compa??ero->id=$compa??eroAux->id;
            $compa??ero->nick=$compa??eroAux->nick;
            $compa??ero->name=$compa??eroAux->name;
            $compa??ero->password=$compa??eroAux->password;
            $compa??ero->caracteristicas=$compa??eroAux->caracteristicas;
            $compa??ero->correo=$compa??eroAux->correo;
            $compa??ero->modo=$compa??eroAux->modo;
            $compa??ero->tipo=$compa??eroAux->tipo;
            array_push($compa??eros,$compa??ero); 
        }
        return $compa??eros;
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