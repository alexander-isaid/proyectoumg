<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sistema
 *
 * @author DIT
 */
class sistema extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('session');
        $this->load->model('model_loggin');
        $this->load->model('model_empresa');
        $this->load->library('form_validation');
    }

    public function index() {
        if ($this->model_loggin->esta_loggiado() == TRUE) {
            $data['usuario'] = $this->session->userdata['usuario'];
            $data['password'] = $this->session->userdata['password'];
            $data['id_user']= $this->session->userdata['id_user'];
            $valid_empresa = $this->model_empresa->get_empresas();
            if ($valid_empresa != FALSE) {
                $this->load->view("sistema/inicio", $data);
            } else  {
                $this->load->view('sistema/empresa/new_empresa', $data);
            }
        } else {
            $this->load->view('publico/index');
        }
    }
    
    public function nueva_empresa() {
        if ($this->model_loggin->esta_loggiado() == TRUE) {
            $data['usuario'] = $this->session->userdata['usuario'];
            $data['password'] = $this->session->userdata['password'];
            $data['id_user'] = $this->session->userdata['id_user'];
            
            $this->form_validation->set_rules('nom_comercial','Nombre de la empresa','required|trim');
            $this->form_validation->set_rules('sitio_web','Sitio web','trim');
            $this->form_validation->set_rules('razon_social','Razon social','trim');
            $this->form_validation->set_rules('correo','Correo electronico','trim'); 
            $this->form_validation->set_rules('telefono','Numero de telefono','trim');
            $this->form_validation->set_rules('num_nit','Numero de NIT','trim');
            $this->form_validation->set_rules('direccion','Numero de NIT','trim');
            $this->form_validation->set_rules('ciudad','Numero de NIT','trim');
            
            $this->form_validation->set_message('required','El campo %s es requeridos');
            
            if ($this->form_validation->run() == FALSE) { 
                $data_res=array(
                    'tipo'=>2,
                    'msg'=> validation_errors(),
                );
            }else{
                $nombre_comercial=$_POST['nom_comercial'];
                $sitio_web=$_POST['sitio_web'];
                $fecha_creacion= date('y-m-d');
                $fecha_modificaion= date('Y-m-d H:i:s');
                $razon_social= $_POST['razon_social'];
                $correo= $_POST['correo'];
                $telefono = $_POST['telefono'];
                $nit = $_POST['num_nit'];
                $direccion = $_POST['direccion'];
                $ciudad= $_POST['ciudad'];
                $pais= $_POST['pais'];
                $moneda= "Q";

                $data_empresa=array(
                    'nombre_empresa'=>$nombre_comercial,
                    'sitio_web'=>$sitio_web,
                    'fecha_creacion'=>$fecha_creacion,
                    'razon_social'=>$razon_social,
                    'correo'=>$correo,
                    'telefono'=>$telefono,
                    'nit'=>$nit,
                    'direccion'=>$direccion,
                    'ciudad'=>$ciudad,
                    'pais'=>$pais,
                    'moneda'=>$moneda,
                    'id_usuario'=>$data['id_user']
                        
                );
                $respuesta=$this->model_empresa->nueva_empresa($data_empresa);
                if($respuesta!=0){
                    $data_res=array(
                        'tipo'=>1,
                        'msg'=>"Empresa creada correctamente",
                    );
                } else {
                    $data_res=array(
                        'tipo'=>0,
                        'msg'=>"No se pudo crear la empresa",
                    );
                }
            }
            echo json_encode($data_res);
        } else {
            $this->load->view('publico/index');
        }
    }
    
    
    public function get_empresas(){
        if ($this->model_loggin->esta_loggiado() == TRUE) {
            $respueta=$this->model_empresa->get_empresa_select();
            if($respueta>0){
                $data_empresa=array(
                    'tipo'=>1,
                    'data'=>$respueta,
                );
            }else{
                $data_empresa=array(
                    'tipo'=>1,
                    'data'=>"No exixten empresas",
                );
            }
            echo json_encode($data_empresa);
        }else{
            $this->load->view('publico/index');
        }
    }
    
    public function get_empresa_select(){
        if ($this->model_loggin->esta_loggiado() == TRUE) {
            $id_empresa=$_POST['id_emprea'];
            $respueta=$this->model_empresa->get_empresa_select($id_empresa);
            if($respueta>0){
                $data_empresa=array(
                    'tipo'=>1,
                    'data'=>$respueta,
                );
            }else{
                $data_empresa=array(
                    'tipo'=>1,
                    'data'=>"No hay empresa",
                );
            }
            echo json_encode($data_empresa);
        }else{
            $this->load->view('publico/index');
        }
    }

}

