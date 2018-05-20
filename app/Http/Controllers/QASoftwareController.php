<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class QASoftwareController extends Controller
{
    protected $base_uri = 'http://localhost:9090/qasoftware';


    public function getView()
    {
      return view('flujos.qasoftware');
    }

    public function enviarPeticion(Request $request){

        $idPeticion = $request->input('idPeticion');
        $descripcion = $request->input('descripcion');
        $departamento = $request->input('departamento');
        $categoria = $request->input('categoria');
        $lenguaje = $request->input('lenguaje');

        $data = array(
            'idPeticion' => $idPeticion,
            'descripcion' => $descripcion,
            'departamento' => $departamento,
            'categoria' => $categoria,
            'lenguaje' => $lenguaje
        );

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

        $arrayJson = get_object_vars($jsonValues->QASoftwareResponse);
        $result = get_object_vars($arrayJson['tns:result']);

        $resultado = $result["$"];
        $error = $result["@xmlns:xmlns"];

        return view('flujos.qasoftware', compact('resultado', 'error'));
    }

    public function verInformes()
    {
        $informes = DB::connection('qasoftware')->select("select * from resultadoinforme");

        return view('flujos.qasoftwareInformes', compact('informes'));
    }
}
