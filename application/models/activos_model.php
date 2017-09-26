<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of activos_model
 *
 * @author Isaid Alexander Reyes Requena
 */
class activos_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
    }
    
    public function get_activos() {
        $this->db->where('estado_activo','1');
        $consulta=$this->db->get('activo_fijo');
        if($consulta->num_rows()>0){
            return $consulta->result();
        }else{
            return FALSE;
        }
    }
    
    public function get_one_activo($idactivo) {
        $this->db->where('id_activo',$idactivo);
        $consulta=$this->db->get('activo_fijo');
        if($consulta->num_rows()==1){
            return $consulta->row();
        }else{
            return FALSE;
        }
        
    }
    
    public function insert_activo($data){
        $this->db->insert('activo_fijo',$data);
        if($this->db->affected_rows()=='1'){
            return $this->db->insert_id();
        }else{
            return FALSE;
        }
    }
    
    public function update_activo($data,$idactivo){
        $this->db->where('id_activo',$idactivo);
        $this->db->update('activo_fijo',$data);
        if($this->db->affected_rows()=='1'){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function delete_activo($estado,$idactivo){
        $this->db->where('id_activo',$idactivo);
        $this->db->set('estado_activo',$estado);
        $this->db->update('activo_fijo');
        if($this->db->affected_rows()=='1'){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    
}
