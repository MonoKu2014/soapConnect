<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facturas extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //validate session es para validar que la sesión este iniciada
        validate_session();
    }


    public function index()
    {

        $data['request']['fecha_desde'] = '';
        $data['request']['fecha_hasta'] = '';
        $data['request']['deudor'] = '';
        $data['request']['sociedad'] = '';
        $data['tabla'] = '';
        $request = $this->input->post();

        if(count($request) > 0){
            $data['request'] = $request;

            //3v3.2017.,
            $endpoint = 'http://SRVCIMVDEV2.cimenta.corp:8000/sap/bc/srt/rfc/sap/zws_envia_fact_04/140/zws_envia_fact_04/zws_envia_fact_04';
            $wsdl = 'http://SRVCIMVDEV2.cimenta.corp:8000/sap/bc/srt/wsdl/flv_10002A101AD1/bndg_url/sap/bc/srt/rfc/sap/zws_envia_fact_04/140/zws_envia_fact_04/zws_envia_fact_04?sap-client=140?wsdl';
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
                var_dump($error->getMessage());
            }

            $response = $client->__call('ZclfiEnviaFactWs',
                ['body' =>
                    [
                        'IBelnr' => '',
                        'IDesde' => $this->input->post('fecha_desde'),
                        'IHasta' => $this->input->post('fecha_hasta'),
                        'IKunnr' => $this->input->post('deudor'),
                        'IXblnr' => ''
                    ]
                ]
            );

            $data['tabla'] = $response;

        }

        $this->load->view('layout/header');
        $this->load->view('facturas/index', $data);
        $this->load->view('layout/footer');
    }



}
