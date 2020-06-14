<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUsuarioRequest;
use App\Http\Requests\RegisterUsuarioRequest;

class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['login','create','store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cantidad_usuarios = Usuario::count();

        // Se genera el código de Habitación //
        $valor_numerico = $cantidad_usuarios + 1;
        $id_usuario = 'USU';
        $parte_numerica = '';

        for ($i = 0;$i < 2; $i++) {
            $parte_numerica = $parte_numerica . '0';
        }

        $id_usuario = $id_usuario . $parte_numerica . $valor_numerico;

        return view('usuario.create',compact('id_usuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterUsuarioRequest $request)
    {
        $usuario = new Usuario();
        $usuario->ID_usuario = $request->id_usuario;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->tipo = 'U';
        $usuario->save();
        return view('usuario.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }

    public function login(LoginUsuarioRequest $request){
        $credenciales = $request->only('email','password');
        if(Auth::attempt($credenciales)){
            //credenciales correctas
            return redirect()->route('front.index');
        }else{
            //credenciales incorrectas
            return redirect()->route('login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('front.index');
    }
}
