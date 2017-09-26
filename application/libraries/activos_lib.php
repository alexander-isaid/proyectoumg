<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of activos_lib
 *
 * @author DIT
 */
class activos_lib {
    private $CI;
    private $array=array();
    //put your code here
    
public function __construct(array $info_data) {
        $this->CI = & get_instance();
        $this->array=$info_data;
        $this->CI->load->model('activos_model');
    }
    public function mostrar_activos() {
        
    }
    public function info_activo() {
        
    }
    public function nuevo_activo(){//insertar activo
        
    }
    public function calcular_depreciacion() {
        
    }
    public function modificar_activo() {
        
    }
    public function asignar_activo(){
        
    }
    public function eliminar_activo(){
        
    }
}
