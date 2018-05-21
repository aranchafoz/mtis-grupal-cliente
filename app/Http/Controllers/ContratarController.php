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
    protected $base_uri = 'http://localhost:3001/';


    public function getView()
    {

      $ofertas = [];
      $solicitantes = [];
      $candidatos = [];
      $trabajadores = [];

      $client = new Client(['base_uri' => $this->base_uri]);

      try {
        $response = $client->request('GET', 'oferta');
        $body = $response->getBody();
        $ofertas = json_decode($body);

        $response = $client->request('GET', 'perfil/solicitante/correo');
        $body = $response->getBody();
        $solicitantes = json_decode($body);

        $response = $client->request('GET', 'perfil/solicitante/linkedin');
        $body = $response->getBody();
        $solicitantes = array_merge($solicitantes, json_decode($body) );

        $response = $client->request('GET', 'perfil/candidato');
        $body = $response->getBody();
        $candidatos = json_decode($body);

        $response = $client->request('GET', 'trabajador');
        $body = $response->getBody();
        $trabajadores = json_decode($body);

      } catch (RequestException $e) {
          if ($e->hasResponse()) {
            if($e->getResponse()->getStatusCode() == 400
            || $e->getResponse()->getStatusCode() == 401) {
                $error = json_decode( $e->getResponse()->getBody() )->msg;
            } else {
                $error = $e->getResponse()->getReasonPhrase();
            }
          }
      }

      return view('flujos.contratar', ['ofertas' => $ofertas, 'solicitantes' => $solicitantes, 'candidatos' => $candidatos, 'trabajadores' => $trabajadores]);
    }

    public function crearOferta(Request $request) {
      dd($request->input('title'));
    }

    public function publicarOferta(Request $request, $id) {
      dd($id);
    }

    public function evaluarPerfil(Request $request, $id) {
      dd($request);
    }

    public function contratarPerfil(Request $request, $id) {
      dd($request);
    }
}
