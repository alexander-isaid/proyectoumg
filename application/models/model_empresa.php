<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_empresa
 *
 * @author DIT
 */
class model_empresa extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_empresas() {
        $this->db->where('estado_empresa',1);
        $empresa = $this->db->get('empresa');
        if ($empresa->num_rows() > 0) {
            return $empresa->result();
        } else {
            return FALSE;
        }
    }
    
    public function get_empresas_select($idempresa) {
        $this->db->where('id_empresa',$idempresa);
        $empresa = $this->db->get('empresa');
        if ($empresa->num_rows() == '1') {
            return $empresa->row();
        } else {
            return FALSE;
        }
    }
    
    
    public function nueva_empresa($data) {
        $nuevo = $this->db->insert('empresa',$data);
        if($this->db->affected_rows()=='1'){
            return $this->db->insert_id();
        }else{
            return FALSE;
        }
    }

}

?>
