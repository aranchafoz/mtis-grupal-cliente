<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ECommerceController extends Controller
{
    protected $base_uri = 'http://localhost:9090/';
    //
    public function getView()
    {
      return view('flujos.contratar');
    }
}