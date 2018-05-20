<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

class ContratarController extends Controller
{
    protected $base_uri = 'http://localhost:9090/';


    public function getView()
    {
      return view('flujos.contratar');
    }
}
