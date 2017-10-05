<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of partner_lib
 *
 * @author DIT
 */
class partner_lib {
    private $CI;
    private $id_proveedor;
    private $array=array();
    //put your code here
    
    public function __construct(array $info_data) {
        $this->CI = & get_instance();
        $this->array=$info_data;
        $this->CI->load->model('model_partner');
    }
    public function mostrar_partner() {
        $proveedores=array();
        $proveedores=$this->CI->load->model_partner->get_partner();
        if($proveedores != FALSE){
            
            echo json_encode($respuesta);
        }else{
            
        }
    }
    public function info_partner() {
        
    }
    public function nuevo_partner(){
        
    }
    public function asigna_emprea_partner() {
        
    }
    public function modificar_partner() {
        
    }
    public function saldo_partner(){
        
    }
    public function eliminar_partner(){
        
    }
    public function log_usuario() {
        
    }
}
