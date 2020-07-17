<?php

namespace App\Http\Controllers;

use App\Testimonio;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','about','rooms','services']);
    }

    public function index()
    {
        $testimonios = Testimonio::all();
        return view('front.index',compact('testimonios'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function rooms()
    {
        $tipos_habitaciones = DB::select('select distinct tipo, cant_camas, descripcion, precio_noche from habitaciones');
        return view('front.rooms',compact('tipos_habitaciones'));
    }

    public function services()
    {
        return view('front.services');
    }
}
