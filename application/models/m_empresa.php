<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of activos_model
 *
 * @author Isaid Alexander Reyes Requena
 */
class M_empresa extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_info_empresa($id_empresa){
        $this->db->where('id_empresa',$id_empresa);
        $empresa =$this->db->get('empresa');
        if($empresa->num_rows()>0){
            return $empresa->row();
        }else{
            return FALSE;
        }
        
    }
}

?>
