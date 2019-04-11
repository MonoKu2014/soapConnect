<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
        $this->load->model('clientes_Model', 'cliente');
    }


    public function agregar()
    {
        $this->load->view('layout/header');
        $this->load->view('clientes/agregar');
        $this->load->view('layout/footer');
    }


    public function guardar()
    {
        $error = 0;
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('rut', 'Rut', 'required');
        $this->form_validation->set_rules('cuenta', 'Cuenta', 'required');

        if($this->form_validation->run() === FALSE){

            $error = 1;

        } else {

            //3v3.2017.,
            $endpoint = 'http://SRVCIMVDEV2.cimenta.corp:8000/sap/bc/srt/rfc/sap/zws_crear_cliente/140/zws_crea_cliente/zws_crea_cliente';
            $wsdl = 'http://SRVCIMVDEV2.cimenta.corp:8000/sap/bc/srt/wsdl/flv_10002A101AD1/bndg_url/sap/bc/srt/rfc/sap/zws_crear_cliente/140/zws_crea_cliente/zws_crea_cliente?sap-client=140?wsdl';
            $usuario = 'efigueroa';
            $pass = 'Evelyn2019!';

            try {
            $client = new \SoapClient($wsdl, array(
                    'location'      => $endpoint,
                    'login'         => $usuario,
                    'password'      => $pass,
                    'soap_version'  => SOAP_1_1,
                    'encoding'      => 'UTF-8',
                    'uri'           => '',
                    'trace'         => 1
                ));
            } catch(SoapFault $error){
                var_dump($error);
            }


            $response = $client->__call('ZclsdCreaClienteWs',
                ['body' =>
                    [
                        'IKna1' =>
                        [
                            'Name1' => strtoupper($this->input->post('nombre')),
                            'Stcd1' => $this->input->post('rut'),
                            'Ktokd' => strtoupper($this->input->post('cuenta'))
                        ]
                    ]
                ]
            );

            $this->session->set_flashdata('response', $response);
        }

        redirect(base_url().'clientes/response');

    }


    function response()
    {
        $data['response'] = $this->session->flashdata('response');
        $this->load->view('layout/header');
        $this->load->view('clientes/respuesta', $data);
        $this->load->view('layout/footer');
    }

}
