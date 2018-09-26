<?php

namespace App\Http\Controllers\yonetim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnasayfaController extends Controller
{
    public function index()
    {
        return view('yonetim.anasayfa');
    }
}
