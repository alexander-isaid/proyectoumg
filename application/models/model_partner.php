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
class model_partner extends CI_Model{
    //put your code her
    
       public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
    }
    
    public function get_partner() {
        $this->db->where('estado','1');
        $consulta=$this->db->get('partner');
        if($consulta->num_rows()>0){
            return $consulta->result();
        }else{
            return FALSE;
        }
    }
    
    public function get_one_partner($idPartner) {
        $this->db->where('id_partner',$idPartner);
        $consulta=$this->db->get('partner');
        if($consulta->num_rows()==1){
            return $consulta->row();
        }else{
            return FALSE;
        }
        
    }
    
    public function insert_partner($data){
        $this->db->insert('partner',$data);
        if($this->db->affected_rows()=='1'){
            return $this->db->insert_id();
        }else{
            return FALSE;
        }
    }
    
    public function update_partner($data,$idPartner){
        $this->db->where('id_patner',$idPartner);
        $this->db->update('partner',$data);
        if($this->db->affected_rows()=='1'){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function delete_partner($estado,$idPartner){
        $this->db->where('id_partner',$idPartner);
        $this->db->set('estado',$estado);
        $this->db->update('partner');
        if($this->db->affected_rows()=='1'){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
