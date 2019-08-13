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
        $this->url_cliente = "http://localhost:8083/rastreador";
    }

    public function getToken() {

        try {

    		$client = new GuzzleHttp\Client();
            $url = $this->url."?option=token&api=oauth2";

			try {

                $response = $client->post($url, [

	    			'form_params' => [
	    				'client_id' => $this->client_id,
                        'grant_type' => "client_credentials",
                        'client_secret' => $this->client_secret
	    			],

                    'headers' => [
	    				'Content-Type' => 'application/x-www-form-urlencoded'
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

    public function ListarContactos() {

        $token = $this->getToken();
        $token = $token['status_body']->access_token;

        try {

    		$client = new GuzzleHttp\Client();

            try {

                $response = $client->get($this->url, [

	    			'query' => [
	    				'webserviceClient' => 'administrator',
                        'webserviceVersion' => '1.0.0',
                        'option' => 'contact',
                        'api' => 'hal',
                        'list' => '0',
                        'access_token' => $token
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

    public function registrarContactos() {

        $token = $this->getToken();
        $token = $token['status_body']->access_token;

        try {

    		$client = new GuzzleHttp\Client();

            for ($i = 1; $i <= 10; $i++) {

                try {

                    $response = $client->post($this->url, [

    	    			'query' => [
    	    				'webserviceClient' => 'administrator',
                            'webserviceVersion' => '1.0.0',
                            'option' => 'contact',
                            'api' => 'hal',
                            'access_token' => $token
    	    			],

                        'form_params' => [
                            'catid' => 777,
                            'name' => 'MarvinCalderon_'.$i.'_201213177'
                        ],

                        'headers' => [
    	    				'Content-Type' => 'application/x-www-form-urlencoded'
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
