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

    function getData() {
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

      return array('ofertas' => $ofertas, 'solicitantes' => $solicitantes, 'candidatos' => $candidatos, 'trabajadores' => $trabajadores);
    }

    public function getView()
    {
      $data = $this->getData();
      return view('flujos.contratar', ['ofertas' => $data['ofertas'], 'solicitantes' => $data['solicitantes'], 'candidatos' => $data['candidatos'], 'trabajadores' => $data['trabajadores'] ]);
    }

    public function crearOferta(Request $request) {
      $category = $request->input('category');
      $title = $request->input('title');
      $description = $request->input('description');
      $skill1name = $request->input('skill1name');
      $skill1level = (int)$request->input('skill1level');
      $skill2name = $request->input('skill2name');
      $skill2level = (int)$request->input('skill2level');


      $client = new Client(['base_uri' => $this->base_uri]);

      $input = [
          'json' => [
              'category' => $category,
              'title' => $title,
              'description' => $description,
              'minimumRequirements' => [
                $skill1name => $skill1level,
                $skill2name => $skill2level
              ]
          ]
      ];

      try {
        $response = $client->request('POST', 'oferta', $input);
        $body = $response->getBody();
        $obj = json_decode($body);

        if($obj->ofertaCreadaCorrectamente) {
          $alert = array('ok' => true, 'message' => 'Oferta creada correctamente');
        }

      } catch (RequestException $e) {
          if ($e->hasResponse()) {
            if($e->getResponse()->getStatusCode() == 400
            || $e->getResponse()->getStatusCode() == 401) {
                dd($e);
                $error = json_decode( $e->getResponse()->getBody() )->msg;
            } else {
                $error = $e->getResponse()->getReasonPhrase();
                $alert = array('ok' => false, 'message' => $error);
            }
          }
      }

      $data = $this->getData();
      return view('flujos.contratar', ['ofertas' => $data['ofertas'], 'solicitantes' => $data['solicitantes'], 'candidatos' => $data['candidatos'], 'trabajadores' => $data['trabajadores'], 'alert' => $alert ]);
    }

    public function publicarOferta(Request $request, $id) {
      $idOferta = (int)$id;

      $client = new Client(['base_uri' => $this->base_uri]);

      try {
        $response = $client->request('GET', 'oferta/' . $idOferta);
        $body = $response->getBody();
        $oferta = json_decode($body);

        $response = $client->request('POST', 'oferta/' . $idOferta . '/publicar');
        $body = $response->getBody();
        $obj = json_decode($body);

        if($obj->ofertaPublicadaCorrectamente) {
          $alert = array('ok' => true, 'message' => 'Oferta publicada correctamente');
        }

      } catch (RequestException $e) {
          if ($e->hasResponse()) {
            if($e->getResponse()->getStatusCode() == 400
            || $e->getResponse()->getStatusCode() == 401) {
                $error = json_decode( $e->getResponse()->getBody() )->msg;
            } else {
                $error = $e->getResponse()->getReasonPhrase();
                $alert = array('ok' => false, 'message' => $error);
            }
          }
      }

      $data = $this->getData();
      return view('flujos.contratar', ['ofertas' => $data['ofertas'], 'solicitantes' => $data['solicitantes'], 'candidatos' => $data['candidatos'], 'trabajadores' => $data['trabajadores'], 'alert' => $alert ]);
    }

    public function evaluarPerfil(Request $request, $id) {
      $idPerfil = (int)$id;

      $mark = $request->input('evaluar-mark');
      $comment = $request->input('evaluar-comment');

      $client = new Client(['base_uri' => $this->base_uri]);

      try {
        $response = $client->request('GET', 'perfil/solicitante/' . $idPerfil);
        $body = $response->getBody();
        $perfil = json_decode($body);


        $response = $client->request('POST', 'perfil/candidato', [
            'json' => [
                'name' => $perfil->name,
                'surnames' => $perfil->surnames,
                'birthdate' => $perfil->birthdate,
                'location' => $perfil->location,
                'habilities' => $perfil->habilities,
                'apliedJob' => $perfil->apliedJob,
                'aplicationMark' => $mark,
                'aplicationComments' => $comment
            ]
        ]);
        $body = $response->getBody();
        $obj = json_decode($body);

        if($obj->candidatoGuardadoCorrectamente) {
          $alert = array('ok' => true, 'message' => 'Solicitante evaluado correctamente');
        }

      } catch (RequestException $e) {
          if ($e->hasResponse()) {
            if($e->getResponse()->getStatusCode() == 400
            || $e->getResponse()->getStatusCode() == 401) {
                $error = json_decode( $e->getResponse()->getBody() )->msg;
            } else {
                $error = $e->getResponse()->getReasonPhrase();
                $alert = array('ok' => false, 'message' => $error);
            }
          }
      }

      $data = $this->getData();
      return view('flujos.contratar', ['ofertas' => $data['ofertas'], 'solicitantes' => $data['solicitantes'], 'candidatos' => $data['candidatos'], 'trabajadores' => $data['trabajadores'], 'alert' => $alert ]);
    }

    public function contratarPerfil(Request $request, $id) {
      $idPerfil = (int)$id;

      $client = new Client(['base_uri' => $this->base_uri]);

      try {
        $response = $client->request('GET', 'perfil/candidato/' . $idPerfil);
        $body = $response->getBody();
        $perfil = json_decode($body);

        $response = $client->request('GET', 'oferta/' . $perfil->apliedJob);
        $body = $response->getBody();
        $oferta = json_decode($body);

        $response = $client->request('POST', 'trabajador', [
            'json' => [
                'name' => $perfil->name,
                'surnames' => $perfil->surnames,
                'birthdate' => $perfil->birthdate,
                'location' => $perfil->location,
                'habilities' => $perfil->habilities,
                'job' => $oferta->title
            ]
        ]);
        $body = $response->getBody();
        $obj = json_decode($body);

        if($obj->trabajadorGuardadoCorrectamente) {
          $alert = array('ok' => true, 'message' => 'Candidato contratado correctamente');
        }

      } catch (RequestException $e) {
          if ($e->hasResponse()) {
            if($e->getResponse()->getStatusCode() == 400
            || $e->getResponse()->getStatusCode() == 401) {
                $error = json_decode( $e->getResponse()->getBody() )->msg;
            } else {
                $error = $e->getResponse()->getReasonPhrase();
                $alert = array('ok' => false, 'message' => $error);
            }
          }
      }

      $data = $this->getData();
      return view('flujos.contratar', ['ofertas' => $data['ofertas'], 'solicitantes' => $data['solicitantes'], 'candidatos' => $data['candidatos'], 'trabajadores' => $data['trabajadores'], 'alert' => $alert ]);
    }
}
