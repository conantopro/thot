<?php

namespace App\Traits;

use SoapClient;
use SoapFault;

trait ManageConsignments
{
    /**
     * Send a request to any service
     * @return string
     */
    public static function consultarRemesa($numeroremesa, $unidadnegocio)
    {
        $url = "http://clientes.tcc.com.co/servicios/informacionremesas.asmx?wsdl";

        try {
            $client = new SoapClient($url, [
                        "trace" => TRUE,
                        "exceptions" => TRUE,
                        'encoding' => 'UTF-8',
                        "connection_timeout" => 30000,
                    ]);
        
            // ConsultarInformacionRemesasEstadosUEN
            $prmConsultarInformacionRemesasEstadosUEN = [
                'Clave' => 'MEDMASLOGISTICA',
                'remesas' =>[
                    [
                        'numeroremesa' => $numeroremesa, 
                        'unidadnegocio' => $unidadnegocio
                    ]
                ],
                'remesasrespuesta' => '',
                'Respuesta' => '',
                'Mensaje' => '',
            ];

            $response = json_encode($client->ConsultarInformacionRemesasEstadosUEN($prmConsultarInformacionRemesasEstadosUEN), JSON_UNESCAPED_UNICODE);
            // $response = json_encode($response, JSON_UNESCAPED_UNICODE);
        } catch ( SoapFault $e ) {
            echo $e->getMessage();
        }

        return $response;
    }
}