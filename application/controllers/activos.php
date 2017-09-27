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
   
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('file');
        $this->load->model('model_loggin');
        
    }
    public function index(){
        if ($this->model_loggin->esta_loggiado() == TRUE) {
            $data['usuario'] = $this->session->userdata['usuario'];
            $data['password'] = $this->session->userdata['password'];
            $data['id_user']= $this->session->userdata['id_user'];
            $this->load->view('sistema/activos_fijos/listado_activos',$data);
        }else{
            $this->load->view('publico/index');
        }
    }
    
    public function nuevo() {
        if ($this->model_loggin->esta_loggiado() == TRUE) {
            $data['usuario'] = $this->session->userdata['usuario'];
            $data['password'] = $this->session->userdata['password'];
            $data['id_user']= $this->session->userdata['id_user'];
            $this->load->view('sistema/activos_fijos/nuevo_activos_fijos',$data);
        }else{
            $this->load->view('publico/index');
        }
    }
    
    public function crear_activo() {
        if ($this->model_loggin->esta_loggiado() == TRUE) {
            $data['usuario'] = $this->session->userdata['usuario'];
            $data['password'] = $this->session->userdata['password'];
            $data['id_user']= $this->session->userdata['id_user'];
            $info_lib=array(
                'id_activo'=>0,
                'id_user'=>$data['id_user'],
            );
            $this->load->library('activos_lib',$info_lib);
            $activo = $this->activos_lib->nuevo_activo();
            echo json_encode($activo);
            
        }else{
            $this->load->view('publico/index');
        }
    }
    
    public function editar($id_activo=NULL) {
        if($id_activo!=NULL){
            if ($this->model_loggin->esta_loggiado() == TRUE) {
                $data['usuario'] = $this->session->userdata['usuario'];
                $data['password'] = $this->session->userdata['password'];
                $data['id_user']= $this->session->userdata['id_user'];
                $data['idActivo']= $id_activo;
                $this->load->view('sistema/activos_fijos/editar_activos_fijos',$data);
            }else{
                $this->load->view('publico/index');
            }
        }else{
            
        }       
    }
    
    
    
    
}
