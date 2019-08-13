<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_lib {

    protected $CI;
    protected $url;
    protected $client_id;
    protected $client_secret;

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->library('codeigniter-guzzle/guzzle');
        $this->url_cliente = "http://localhost:8081/cliente";
        $this->url_piloto = "http://localhost:8082/piloto";
        $this->url_rastreo = "http://localhost:8083/rastreador";
    }

    public function validateClient($id) {

        try {

    		$client = new GuzzleHttp\Client();

            try {

                $response = $client->get($this->url_cliente, [

	    			'query' => [
	    				'id' => $id
	    			]

                ]);

                // Respuesta de Guzzle
	    		$respuesta = array(
	    			'status_code' 		=> $response->getStatusCode(),			// 200
	    			'status_message'	=> $response->getReasonPhrase(),		// OK
	    			'status_protocol'	=> $response->getProtocolVersion(),		// 1.1
	    			'status_body'		=> json_decode($response->getBody())
	    		);

	  		} catch (GuzzleHttp\Exception\BadResponseException $e) {

	    		$response = $e->getResponse();
	    		$responseBodyAsString = $response->getBody()->getContents();

	    		$respuesta = array(
	    			'status_code' 	 => 0,
	    			'status_message' => $responseBodyAsString
	    		);

	  		}

		} catch (GuzzleHttp\Exception\ConnectException $e) {

    		$respuesta = array(
    			'status_code' 	 => 0,
    			'status_message' => 'Hubo un problema con la conexión.'
    		);

    	}

    	return $respuesta;

    }

    public function getAvailablePilot($coor_x, $coor_y) {

        try {

            $client = new GuzzleHttp\Client();

            try {

                $response = $client->get($this->url_piloto, [

                    'query' => [
                        'coor_x' => $coor_x,
                        'coor_y' => $coor_y
                    ]

                ]);

                // Respuesta de Guzzle
                $respuesta = array(
                    'status_code' 		=> $response->getStatusCode(),			// 200
                    'status_message'	=> $response->getReasonPhrase(),		// OK
                    'status_protocol'	=> $response->getProtocolVersion(),		// 1.1
                    'status_body'		=> json_decode($response->getBody())
                );

            } catch (GuzzleHttp\Exception\BadResponseException $e) {

                $response = $e->getResponse();
                $responseBodyAsString = $response->getBody()->getContents();

                $respuesta = array(
                    'status_code' 	 => 0,
                    'status_message' => $responseBodyAsString
                );

            }

        } catch (GuzzleHttp\Exception\ConnectException $e) {

            $respuesta = array(
                'status_code' 	 => 0,
                'status_message' => 'Hubo un problema con la conexión.'
            );

        }

        return $respuesta;

    }

    public function notifyJourney($id_cliente, $piloto) {

        try {

            $client = new GuzzleHttp\Client();

            try {

                $response = $client->get($this->url_rastreo, [

                    'query' => [
                        'id_cliente' => $id_cliente,
                        'id_piloto' => $piloto->id,
                        'nombre_piloto' => $piloto->displayName
                    ]

                ]);

                // Respuesta de Guzzle
                $respuesta = array(
                    'status_code' 		=> $response->getStatusCode(),			// 200
                    'status_message'	=> $response->getReasonPhrase(),		// OK
                    'status_protocol'	=> $response->getProtocolVersion(),		// 1.1
                    'status_body'		=> json_decode($response->getBody())
                );

            } catch (GuzzleHttp\Exception\BadResponseException $e) {

                $response = $e->getResponse();
                $responseBodyAsString = $response->getBody()->getContents();

                $respuesta = array(
                    'status_code' 	 => 0,
                    'status_message' => $responseBodyAsString
                );

            }

        } catch (GuzzleHttp\Exception\ConnectException $e) {

            $respuesta = array(
                'status_code' 	 => 0,
                'status_message' => 'Hubo un problema con la conexión.'
            );

        }

        return $respuesta;

    }

}
