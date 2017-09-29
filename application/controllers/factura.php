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
    }
    
    public function index() {
        $this->load->view('sistema/facturas/factura_proveedor');
    }
    //put your code here
}
