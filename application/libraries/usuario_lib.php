<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario_lib
 *
 * @author Isaid Alexander Reyes Requena
 */
class usuario_lib {
    //put your code here
    
    private $CI;
    private $array=array();
    //put your code here
    
    public function __construct(array $info_data) {
        $this->CI = & get_instance();
        $this->array=$info_data;
        $this->CI->load->model('model_usuario');
    }
    public function mostrar_usuario() {
        
    }
    public function info_usuario() {
        
    }
    public function nuevo_usuario(){
        
    }
    public function asigna_emprea_usuario() {
        
    }
    public function modificar_usuario() {
        
    }
    public function cambiar_contraseña(){
        
    }
    public function eliminar_usuario(){
        
    }
    public function log_usuario() {
        
    }
}
