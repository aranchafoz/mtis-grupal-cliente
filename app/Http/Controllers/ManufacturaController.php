<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ManufacturaController extends Controller
{
    protected $base_uri = 'http://localhost:9090/';
    //
    public function getView()
    {
    	$client = new Client();
    	$requestUrl = $this->base_uri.'fabricacionPaneles/pedidos/estado/Nuevo';
    	$paneles = null;

    	try {
    		$result = $client->get($requestUrl);
    		$paneles = json_decode($result->getBody()->getContents());


    	} catch (GuzzleException $e) {
	    	$jsonValues = json_decode($e->getResponse()->getBody(true));

	    	if ($jsonValues->status == "400") {
	    		$error = $jsonValues->error;

	    	} else  if ($jsonValues->status == "500") {
	    		$error = "Error en el servidor";
	    		$response = $jsonValues->data;
	    	}
	    }

    	return view('flujos.manufactura', compact('paneles'));
    }

    public function getMaterialesAndPedidos() {
    	$client = new Client();
    	$urlMateriales = $this->base_uri.'fabricacionPaneles/materiales';
    	$urlPedidos = $this->base_uri.'fabricacionPaneles/pedidosMateriales';

    	try {
    		$result = $client->get($urlMateriales);
    		$materiales = json_decode($result->getBody()->getContents());

    		$result = $client->get($urlPedidos);
    		$pedidos = json_decode($result->getBody()->getContents());

    	} catch (GuzzleException $e) {
	    	$jsonValues = json_decode($e->getResponse()->getBody(true));

	    	if ($jsonValues->status == "400") {
	    		$error = $jsonValues->error;

	    	} else  if ($jsonValues->status == "500") {
	    		$error = "Error en el servidor";
	    		$response = $jsonValues->data;
	    	}
	    }

	    return view('flujos.materiales', compact('materiales', 'pedidos'));
    }

    /**
    * Actualiza un pedido
    * @param $id del pedido
    */
    public function actualizarPedido(Request $request, $id) {

    	$client = new Client();
    	$requestUrl = $this->base_uri."fabricacionPaneles/pedidos/$id/siguienteEstado";

    	try {
	    	$result = $client->get($this->base_uri);

	    } catch (GuzzleException $e) {
	    	abort(500);
	    }


    	return $this->getView();
    }
}
