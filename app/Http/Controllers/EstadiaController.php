<?php

namespace App\Http\Controllers;

use App\Estadia;
use Illuminate\Http\Request;

class EstadiaController extends Controller
{
    public function __construct(){
        $this->middleware('funcionario');
        //->except(['index'])
    }

    public function index()
    {
        return view('estadia.index');
        // return redirect()->route('estadias.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Estadia  $estadia
     * @return \Illuminate\Http\Response
     */
    public function show(Estadia $estadia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estadia  $estadia
     * @return \Illuminate\Http\Response
     */
    public function edit(Estadia $estadia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estadia  $estadia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estadia $estadia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estadia  $estadia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estadia $estadia)
    {
        //
    }
}
