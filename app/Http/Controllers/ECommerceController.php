<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ECommerceController extends Controller
{
    protected $base_uri = 'http://localhost:9090/ecommerce';
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

			if($jsonValues->panelesEncargados == 0){
				$comprado=true;
			}else{
				$clienteDragonBestiaZ = new Client();
				$comprado=false;
				$error = "Productos insuficientes,".$jsonValues->panelesEncargados." encargados al proveedor";
				$datos = array("estado" => "Nuevo", "panelesEncargados" => $jsonValues->panelesEncargados, "cliente" => $idCliente);
				$resultado = $clienteDragonBestiaZ->post('localhost:9090/fabricacionPaneles/pedidos', [
					'json' => $datos
				]);

				$json = json_decode($resultado->getBody()->getContents());
			}
	    } catch (GuzzleException $e) {
	
	    	$jsonValues = json_decode($e->getResponse()->getBody(true));
			dd($jsonValues);
	    	if ($jsonValues->error) {
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
