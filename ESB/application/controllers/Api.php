<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('api_lib');
    }

    public function solicitudUber()
	{
        /* Recepción de parámetros de solicitud */
        $id_cliente = $_GET['id'];
        $coor_x = $_GET['coor_x'];
        $coor_y = $_GET['coor_y'];

        /* El primer paso es el de validar la existencia del usuario en el sistema */
        $cliente_resp = $this->api_lib->validateClient($id_cliente);

        if($cliente_resp['status_code'] == 202) {

            /* Una vez encontrado el cliente, se procede a buscar un piloto disponible para el usuario basado en la ubicación y disponibilidad del piloto */
            $piloto_resp = $this->api_lib->getAvailablePilot($coor_x, $coor_y);

            if($piloto_resp['status_code'] == 202) {

                /* Una vez encontrado un piloto disponible, se utiliza la funcion de rastreo que envia un mensaje tanto al piloto de su nuevo viaje, como al usuario del piloto que se le asigno */
                $rastreo_resp = $this->api_lib->notifyJourney($id_cliente, $piloto_resp['status_body']);

                echo json_encode($rastreo_resp['status_body']);

            }

        }

	}

}
