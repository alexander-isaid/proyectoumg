<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loggin
 *
 * @author Isaid Alexander Reyes Requena
 */
class loggin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('file');
        $this->load->model('model_loggin');
    }

    public function index() {
        $this->form_validation->set_message('required', '#[Error!] El campo %s es requerido');
        $this->form_validation->set_message('valid_email', '#[Error!] Su mail no es valido');
        $this->form_validation->set_rules('usuario', 'mail', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) { //si no supera las reglas de validación se recarga la vista del formulario
            $respuesta = array(
                'tipo' => 0,
                'res' => "Debe ingresar usuario y contraseña",
            );
            echo json_encode($respuesta);
        } else {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $isValidLogin = $this->model_loggin->validate_info($usuario, $password); //pasamos los valores al modelo para que compruebe si existe el usuario con ese password
            if ($isValidLogin != FALSE) {
                $sesion_data = array(
                    'usuario' => $_POST['usuario'],
                    'password' => $_POST['password'],
                    'id_user'=>$isValidLogin->id_usuario,
                );
                $this->session->set_userdata($sesion_data);
                $data['usuario'] = $this->session->userdata['usuario'];
                $data['password'] = $this->session->userdata['password'];
                $respuesta = array(
                    'tipo' => 1,
                    'res' => "",
                );
                echo json_encode($respuesta);
            } else {
                $respuesta = array(
                    'tipo' => 0,
                    'res' => "Usuario y contraseña no son validos",
                );
                echo json_encode($respuesta);
            }
        }
    }

}

