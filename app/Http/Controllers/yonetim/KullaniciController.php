<?php

namespace App\Http\Controllers\yonetim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KullaniciController extends Controller
{


    public function oturumac()
    {
        return view('yonetim.oturumac');
    }
}
