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
        $this->CI->load->library('form_validation');
        $this->CI->load->model('activos_model');
    }
    public function mostrar_activos() {
        $resultado=$this->CI->load->activos_model->get_activos();
        if($resultado != FALSE){
            $lista_activos=array(
                'tipo'=>1,
                'activos'=>$resultado,
            );
        }else{
            $lista_activos=array(
                'tipo'=>1,
                'activos'=>$resultado,
            );
        }
        return json_encode($lista_activos);
        
    }
    public function info_activo() {
        
    }
    public function nuevo_activo(){//insertar activo
        $this->form_validation->set_rules('name_activo','Nombre del activo','required|trim');
        $this->form_validation->set_message('required', '%s: es requerido');
        if ($this->form_validation->run() == FALSE) {
            $respuesta=array(
                'tipo'=>0,
                'msg'=> validation_errors(),
            );
        }else{
            $respuesta=array(
                'tipo'=>1,
                'msg'=>"correctamente",
            );
        }
        return json_encode($respuesta);
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
