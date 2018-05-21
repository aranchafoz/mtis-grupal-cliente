<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ECommerceController extends Controller
{
    protected $base_uri = 'http://localhost:3002/ecommerce';
    //
    public function getView()
    {
		$client = new Client();
    	$requestUrl = $this->base_uri.'/stock';
    	$productos = null;

    	try {
    		$result = $client->get($requestUrl);
			$productos = json_decode($result->getBody()->getContents());
    	} catch (GuzzleException $e) {
	    	$jsonValues = json_decode($e->getResponse()->getBody(true));

	    	if ($jsonValues->status == "400") {
	    		$error = $jsonValues->error;

	    	} else  if ($jsonValues->status == "500") {
	    		$error = "Error en el servidor";
	    		$response = $jsonValues->data;
			}
		}
		return view('flujos.ecommerce', compact('productos'));
	}
	

	public function getFacturas()
    {
		$client = new Client();
    	$requestUrl = $this->base_uri.'/factura';
    	$facturas = null;

    	try {
    		$result = $client->get($requestUrl);
			$facturas = json_decode($result->getBody()->getContents());
    	} catch (GuzzleException $e) {
	    	$jsonValues = json_decode($e->getResponse()->getBody(true));

	    	if ($jsonValues->status == "400") {
	    		$error = $jsonValues->error;

	    	} else  if ($jsonValues->status == "500") {
	    		$error = "Error en el servidor";
	    		$response = $jsonValues->data;
			}
		}
		return view('flujos.facturas', compact('facturas'));
	}
	
	public function getViewCompra()
    {
		return view('flujos.comprar');
	}

	public function comprarProducto(Request $request) {

    	$idCliente = $request->input('idCliente');
    	$idProducto = $request->input('idProducto');
    	$Cantidad = $request->input('Cantidad');


    	$data = array('idCliente' => $idCliente, 'idProducto' => $idProducto, 'Cantidad' => $Cantidad);

    	$client = new Client();
	    $headers = [
	      'Content-Type' => 'application/json',
	    ];

	    try {
			$url=$this->base_uri.'/factura';
	    	$result = $client->post($url, [
	    		'headers' => $headers,
	    		'json' => $data
	    	]);

	    	$jsonValues = json_decode($result->getBody()->getContents());
			$comprado=true;
	    } catch (GuzzleException $e) {
	    	$jsonValues = json_decode($e->getResponse()->getBody(true));

	    	if ($jsonValues->status == "400") {
	    		$generado = false;
	    		$error = $jsonValues->error;

	    	} else  if ($jsonValues->status == "500") {
	    		$generado = false;
	    		$error = "Error en el servidor";
	    		$response = $jsonValues->data;
	    	}
	    }
	    return view('flujos.comprar', compact('comprado', 'error'));
    }
}
