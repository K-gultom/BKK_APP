<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class persyaratanController extends Controller
{
    public function izinPraktik(){

        return view('persyaratan.izinpraktik');
    }


    public function layakTerbang()
    {
       return view('persyaratan.layakterbang');
    }


    public function pengangkutanJenazah()
    {
       return view('persyaratan.pengangkutanjenazah');
    }


    public function keteranganSehat()
    {
       return view('persyaratan.keterangansehat');
    }


    
}
