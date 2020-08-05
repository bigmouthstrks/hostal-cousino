<?php

namespace App\Http\Controllers;

use App\Testimonio;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index','about','services']);
    }

    public function index()
    {
        /*
        $testimonio1 = Testimonio::find(0);
        $testimonio1->getOriginal();
        $testimonios = Testimonio::all();
        $cantidad = Testimonio::count();*/

        return view('front.index'/*,compact('testimonios','cantidad','testimonio1')*/);
    }

    public function about()
    {
        return view('front.about');
    }

    public function services()
    {
        return view('front.services');
    }
}
