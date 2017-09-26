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
    private $array=array();
    //put your code here
    
    public function __construct(array $info_data) {
        $this->CI = & get_instance();
        $this->array=$info_data;
        $this->CI->load->model('model_usuario');
    }
    public function mostrar_partner() {
        
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
