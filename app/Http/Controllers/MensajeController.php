<?php

namespace App\Http\Controllers;

use App\Mensaje;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
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
        return view('mensaje.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mensaje  $Mensaje
     * @return \Illuminate\Http\Response
     */
    public function show(Mensaje $Mensaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mensaje  $Mensaje
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensaje $Mensaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mensaje  $Mensaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensaje $Mensaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mensaje  $Mensaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensaje $Mensaje)
    {
        //
    }
}
