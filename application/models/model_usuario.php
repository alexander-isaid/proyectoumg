<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of partner_model
 *
 * @author Isaid Alexander Reyes Requena
 */
class model_usuario extends CI_Model{
    //put your code her
    
       public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
    }
    
    public function get_usuario() {
        $this->db->where('estado','1');
        $consulta=$this->db->get('usuario');
        if($consulta->num_rows()>0){
            return $consulta->result();
        }else{
            return FALSE;
        }
    }
    
    public function get_one_usuarios($idUsuario) {
        $this->db->where('id_usuario',$idUsuario);
        $consulta=$this->db->get('usuario');
        if($consulta->num_rows()==1){
            return $consulta->row();
        }else{
            return FALSE;
        }
        
    }
    
    public function insert_partner($data){
        $this->db->insert('usuario',$data);
        if($this->db->affected_rows()=='1'){
            return $this->db->insert_id();
        }else{
            return FALSE;
        }
    }
    
    public function update_partner($data,$idUsuario){
        $this->db->where('id_usuario',$idUsuario);
        $this->db->update('usuario',$data);
        if($this->db->affected_rows()=='1'){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function delete_partner($estado,$idUsuario){
        $this->db->where('id_usuario',$idUsuario);
        $this->db->set('estado',$estado);
        $this->db->update('usuario');
        if($this->db->affected_rows()=='1'){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}