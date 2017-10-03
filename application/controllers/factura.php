<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of factura
 *
 * @author ALEX-DEV
 */
class factura extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('model_loggin');
    }
    
    public function index() {
        if ($this->model_loggin->esta_loggiado() == TRUE) {
            $data['usuario'] = $this->session->userdata['usuario'];
            $data['password'] = $this->session->userdata['password'];
            $data['id_user']= $this->session->userdata['id_user'];
            $this->load->view('sistema/facturas/factura_proveedor',$data);
        }else{
            $this->load->view('publico/index');
        }    
    }
    
    public function nueva_factura() {

    }
    //put your code here
}
