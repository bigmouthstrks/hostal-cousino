<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUsuarioRequest;
use App\Http\Requests\RegisterUsuarioRequest;
use Illuminate\Support\Facades\DB;

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
        $usuarios = DB::select('SELECT * FROM usuarios');
        $cantidad_usuarios = 0;

        foreach ($usuarios as $usuario) {
            if (strpos($usuario->ID_usuario, 'USU') !== false) {
                $cantidad_usuarios = $cantidad_usuarios + 1;
            }
        }

        // Se genera el código de Usuario //
        $valor_numerico = $cantidad_usuarios + 1;
        $id_usuario = 'USU';
        $parte_numerica = '';

        if ($valor_numerico < 10) {
            $parte_numerica = '00';
        }
        if ($valor_numerico > 9 && $valor_numerico < 100) {
            $parte_numerica = '0';
        }
        if ($valor_numerico > 99) {
            $parte_numerica = '';
        }

        $id_usuario = $id_usuario . $parte_numerica . $valor_numerico;

        return view('usuario.create',compact('id_usuario'));
    }

    public function create_funcionario()
    {
        $funcionarios = DB::select('SELECT * FROM usuarios');
        $cantidad_funcionarios = 0;

        foreach ($funcionarios as $funcionario) {
            if (strpos($funcionario->ID_usuario, 'FUN') !== false) {
                $cantidad_funcionarios = $cantidad_funcionarios + 1;
            }
        }

        // Se genera el código de Funcionario //
        $valor_numerico = $cantidad_funcionarios + 1;
        $id_funcionario = 'FUN';
        $parte_numerica = '';

        if ($valor_numerico < 10) {
            $parte_numerica = '00';
        }
        if ($valor_numerico > 9 && $valor_numerico < 100) {
            $parte_numerica = '0';
        }
        if ($valor_numerico > 99) {
            $parte_numerica = '';
        }

        $id_funcionario = $id_funcionario . $parte_numerica . $valor_numerico;

        return view('usuario.create_funcionario',compact('id_funcionario'));
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

    public function store_funcionario(RegisterUsuarioRequest $request)
    {
        $usuario = new Usuario();
        $usuario->ID_usuario = $request->id_funcionario;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->tipo = 'F';
        $usuario->save();
        return redirect()->route('front.index');
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
