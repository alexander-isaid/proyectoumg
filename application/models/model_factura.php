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
class model_factura extends CI_Model{
    //put your code her
    
       public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
    }
    
    public function get_facturas($estado=1) {
        $this->db->where('estado_factura',$estado);
        $consulta=$this->db->get('facturas');
        if($consulta->num_rows()>0){
            return $consulta->result();
        }else{
            return FALSE;
        }
    }
    
    public function get_one_usuarios($idFactura) {
        $this->db->where('id_factura',$idFactura);
        $consulta=$this->db->get('factura');
        if($consulta->num_rows()==1){
            return $consulta->row();
        }else{
            return FALSE;
        }
        
    }
    
    public function insert_partner($data){
        $this->db->insert('factura',$data);
        if($this->db->affected_rows()=='1'){
            return $this->db->insert_id();
        }else{
            return FALSE;
        }
    }
    
    public function update_partner($data,$idFactura){
        $this->db->where('id_factura',$idFactura);
        $this->db->update('factura',$data);
        if($this->db->affected_rows()=='1'){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function delete_partner($estado,$idFactura){
        $this->db->where('id_factura',$idFactura);
        $this->db->set('estado_factura',$estado);
        $this->db->update('factura');
        if($this->db->affected_rows()=='1'){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}