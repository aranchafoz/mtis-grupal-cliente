<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ProgramacionController extends Controller
{
    protected $base_uri = 'http://localhost:9090/moverpanelsolar';
    //
    public function getView()
    {
      return view('flujos.programacion');
    }

    public function movePanel(Request $request) {
    	$data = array('hora' => $request->input('panel_value'));

    	$client = new Client();
	    $headers = [
	      'Content-Type' => 'application/json',
          'Content-Length: ' . strlen(json_encode($data))
	    ];

	    try {
	    	$result = $client->post($this->base_uri, [
	    		'headers' => $headers,
	    		'json' => $data
	    	]);

	    	$jsonValues = json_decode($result->getBody()->getContents());

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

	    $arrayJson = get_object_vars($jsonValues->MoverPanelSolarOrquestadorResponse);
	    $result = get_object_vars($arrayJson['tns:result']);

	   	$moved = $result["$"];



	    return view('flujos.programacion', compact('moved'));
    }

}
