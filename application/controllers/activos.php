<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of activos
 *
 * @author Isaid Alexander Reyes Requena
 */
class activos extends CI_Controller {
   
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('file');
        $this->load->model('model_loggin');
    }
    public function index() {
        if ($this->model_loggin->esta_loggiado() == TRUE) {
            $data['usuario'] = $this->session->userdata['usuario'];
            $data['password'] = $this->session->userdata['password'];
            $data['id_user']= $this->session->userdata['id_user'];
            $this->load->view('sistema/activos_fijos/activos_fijos',$data);
        }else{
            $this->load->view('publico/index');
        }
    }
}
