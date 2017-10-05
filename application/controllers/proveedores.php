<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of proveedores
 * 
 *
 * @author ALEX-DEV
 */

/** Clase */
class proveedores extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('file');
        $this->load->model('model_partner');
        $this->load->model('model_loggin');
    }
    
    public function index() {
        if ($this->model_loggin->esta_loggiado() == TRUE) {
            $data['usuario'] = $this->session->userdata['usuario'];
            $data['password'] = $this->session->userdata['password'];
            $data['id_user']= $this->session->userdata['id_user'];
            $this->load->view('sistema/proveedores/nuevo_proveedor',$data);
        }else{
            $this->load->view('publico/index');
        }
    }
    
    public function get_proveedores(){
        if ($this->model_loggin->esta_loggiado() == TRUE) {
            $data['usuario'] = $this->session->userdata['usuario'];
            $data['password'] = $this->session->userdata['password'];
            $data['id_user']= $this->session->userdata['id_user'];
            
        }else{
            $this->load->view('publico/index');
        }
    }
    

}
