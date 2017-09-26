<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_loggin
 *
 * @author Isaid Alexander Reyes Requena
 */
class model_loggin extends CI_Model {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
    }

    public function validate_info($usuario, $password) {
        $this->db->where('email', $usuario);
        $this->db->where('pass', $password);
        $usuario = $this->db->get('usuario');
        if ($usuario->num_rows() == 1) {
            return $usuario->row();
        } else {
            return FALSE;
        }
    }

    public function esta_loggiado() {
        if (isset($this->session->userdata['usuario']) && isset($this->session->userdata['password'])) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>
