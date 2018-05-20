<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubidaArchivosController extends Controller
{
    protected $base_uri = 'http://localhost:9090/';
    //
    public function getView()
    {
      return view('flujos.subirfichero');
    }

    /**
    * Envia el fichero
    */
    public function enviarFichero(Request $request) {
    	
    }
}
