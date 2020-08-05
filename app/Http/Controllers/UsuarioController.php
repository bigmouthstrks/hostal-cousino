<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeAddressRequest;
use App\Http\Requests\ChangeEmailRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ChangePhoneRequest;
use App\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUsuarioRequest;
use App\Http\Requests\RegisterUsuarioRequest;
use App\Http\Requests\RegisterReservanteRequest;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['login','create','store']);

        $this->middleware('funcionario')->only('create_funcionario');
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

    public function storeReservante(RegisterReservanteRequest $request)
    {
        $usuario = new Usuario();
        $usuario->id_usuario = $request->id_usuario;
        $usuario->nombre = $request->nombre;
        $usuario->apellido_paterno = $request->apellido_paterno;
        $usuario->apellido_materno = $request->apellido_materno;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->email);
        $usuario->tipo = 'U';
        $usuario->save();

        $id_reservante = $request->id_usuario;

        return redirect()->route('reservas.createReservante',compact('id_reservante'));
        // return redirect()->route('reservas.createReservante')->with( ['id_reservante' => $id_reservante] );
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

    public function edit(Usuario $usuario)
    {
        $usuario_actual = Auth::user();
        return view('usuario.edit', compact('usuario_actual'));
    }

    public function change_password(Usuario $usuario)
    {
        $usuario_actual = Auth::user();
        return view('usuario.change_password', compact('usuario_actual'));
    }

    public function update_password(ChangePasswordRequest $passwordRequest, Usuario $usuario)
    {
        if (Hash::make($passwordRequest->current_password) == $usuario->password){
            echo('Las contraseñas coinciden');
            if ($passwordRequest->new_password == ''){
                $usuario->password = $usuario->password;
            }else{
                if ($passwordRequest->new_password != ''){
                    $usuario->password = Hash::make($passwordRequest->new_password);
                }
            }
        }

        $usuario->save();
        return redirect()->route('usuarios.edit',Auth::user()->id_usuario)->with('success','Contraseña actualizado exitosamente');
    }

    public function change_phone(Usuario $usuario)
    {
        $usuario_actual = Auth::user();
        return view('usuario.change_phone', compact('usuario_actual'));
    }

    public function update_phone(ChangePhoneRequest $phoneRequest, Usuario $usuario)
    {
        if ($phoneRequest->new_phone == ''){
            $usuario->telefono = $usuario->telefono;
        }else{
            if ($phoneRequest->new_phone != ''){
                $usuario->telefono = $phoneRequest->new_phone;
            }
        }

        $usuario->save();
        return redirect()->route('usuarios.edit',Auth::user()->id_usuario)->with('success','Teléfono actualizado exitosamente');
    }

    public function change_email(Usuario $usuario)
    {
        $usuario_actual = Auth::user();
        return view('usuario.change_email', compact('usuario_actual'));
    }

    public function update_email(ChangeEmailRequest $emailRequest, Usuario $usuario)
    {
        if ($emailRequest->new_email == ''){
            $usuario->email = $usuario->email;
        }else{
            if ($emailRequest->new_email != ''){
                $usuario->email = $emailRequest->new_email;
            }
        }
        $usuario->save();
        return redirect()->route('usuarios.edit',Auth::user()->id_usuario)->with('success','Correo electrónico actualizado exitosamente');
    }

    public function change_address(Usuario $usuario)
    {
        $usuario_actual = Auth::user();
        return view('usuario.change_address', compact('usuario_actual'));
    }

    public function update_address(ChangeAddressRequest $addressRequest, Usuario $usuario)
    {
        if ($addressRequest->new_address == ''){
            $usuario->direccion = $usuario->direccion;
        }else{
            if ($addressRequest->new_address != ''){
                $usuario->direccion = $addressRequest->new_address;
            }
        }

        if ($addressRequest->new_city == ''){
            $usuario->ciudad = $usuario->ciudad;
        }else{
            if ($addressRequest->new_city != ''){
                $usuario->ciudad = $addressRequest->new_city;
            }
        }

        if ($addressRequest->new_country == ''){
            $usuario->pais = $usuario->pais;
        }else{
            if ($addressRequest->new_country != ''){
                $usuario->pais = $addressRequest->new_country;
            }
        }

        $usuario->save();
        return redirect()->route('usuarios.edit',Auth::user()->id_usuario)->with('success','Dirección actualizada exitosamente');
    }

    public function destroy(Usuario $usuario)
    {
        Auth::logout();
        $usuario->delete();
        return redirect()->route('login');
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
