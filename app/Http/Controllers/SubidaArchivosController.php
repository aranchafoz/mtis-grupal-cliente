<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class SubidaArchivosController extends Controller
{
    protected $base_uri = 'http://localhost:9090/subirFichero';
    //
    public function getView()
    {
      return view('flujos.subirfichero');
    }

    /**
    * Envia el fichero
    */
    public function enviarFichero(Request $request) {

    	$idWorker = $request->input('idWorker');
    	$idOffice = $request->input('idOffice');
    	$idDepartment = $request->input('idDepartment');
    	$content = $request->input('content');
    	$extension = $request->input('extension');
    	$date = $request->input('date');

    	$data = array('idWorker' => $idWorker, 'idOffice' => $idOffice, 'idDepartment' => $idDepartment, 
    		'content' => $content, 'extension' => $extension, 'date' => $date);

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

	    $arrayJson = get_object_vars($jsonValues->UploadFileProcessResponse);
	    $uploaded = get_object_vars($arrayJson['tns:uploaded']);
	    $result = get_object_vars($arrayJson['tns:result']);
	
	   	$upload = $uploaded["$"];
	   	$error = $result["@xmlns:xmlns"];



	    return view('flujos.subirfichero', compact('upload', 'error'));
    }
}
