<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUsuarioRequest;
use App\Http\Requests\RegisterUsuarioRequest;
use App\Http\Requests\UsuarioEditRequest;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['login','create','store']);
    }


    public function index()
    {
        //
    }


    public function create()
    {
        $usuarios = DB::select('SELECT * FROM usuarios');
        $cantidad_usuarios = 0;

        foreach ($usuarios as $usuario) {
            if (strpos($usuario->id_usuario, 'USU') !== false) {
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
            if (strpos($funcionario->id_usuario, 'FUN') !== false) {
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

    public function store(RegisterUsuarioRequest $request)
    {
        $usuario = new Usuario();
        $usuario->id_usuario = $request->id_usuario;
        $usuario->nombre = $request->nombre;
        $usuario->apellido_paterno = $request->apellido_paterno;
        $usuario->apellido_materno = $request->apellido_materno;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->tipo = 'U';
        $usuario->save();

        return redirect()->route('login')->with('success','¡Registro realizado con éxito!');
    }

    public function store_funcionario(RegisterUsuarioRequest $request)
    {
        $usuario = new Usuario();
        $usuario->id_usuario = $request->id_funcionario;
        $usuario->nombre = $request->nombre;
        $usuario->apellido_paterno = $request->apellido_paterno;
        $usuario->apellido_materno = $request->apellido_materno;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->tipo = 'F';
        $usuario->save();

        return back()->with('success','¡Registro realizado con éxito!');
    }

    public function show(Usuario $usuario)
    {
        //
    }

    public function edit(Usuario $usuario)
    {
        $usuario_actual = Auth::user();
        return view('usuario.edit', compact('usuario_actual'));
    }

    public function update(UsuarioEditRequest $request, Usuario $usuario)
    {
        if ($request->direccion != $usuario->direccion){
            $usuario->direccion = $request->direccion;
        }

        if ($request->ciudad != $usuario->ciudad){
            $usuario->ciudad = $request->ciudad;
        }

        if ($request->pais != $usuario->pais){
            $usuario->pais = $request->pais;
        }

        if ($request->password != $usuario->password){
            $usuario->password = $request->password;
        }

        if ($request->email != $usuario->email){
            $usuario->email = $request->email;
        }

        $usuario->save();
        return redirect()->route('front.index');
    }

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
