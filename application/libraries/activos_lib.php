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
    private $data_lib=array();
    //put your code here
    
public function __construct(array $info_data) {
        $this->CI = & get_instance();
        $this->data_lib=$info_data;
        $this->CI->load->library('form_validation');
        $this->CI->load->model('activos_model');
        date_default_timezone_set("America/Guatemala");
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
        $id_activo= $this->data_lib['id_activo'];
        
        $this->CI->form_validation->set_rules('name_activo','Nombre del activo','required|trim');
        $this->CI->form_validation->set_rules('valor_bruto','Valor bruto del activo','required|trim');
        $this->CI->form_validation->set_rules('valor_residual','Valor Recidual','decimal|trim');
        $this->CI->form_validation->set_rules('fecha_compra','Fecha de compra','required|trim');
        $this->CI->form_validation->set_rules('id_partner','Valor Recidual','trim');
        $this->CI->form_validation->set_rules('id_user_asig','Valor Recidual','trim');
        $this->CI->form_validation->set_rules('id_empresa','Valor Recidual','trim');
        $this->CI->form_validation->set_rules('id_factura','Valor Recidual','trim');
        $this->CI->form_validation->set_message('required', '%s: es requerido');
        $this->CI->form_validation->set_message('decimal','%s debe ser numerico');
        
        if ($this->CI->form_validation->run() == FALSE) {
            $respuesta=array(
                'tipo'=>0,
                'msg'=> validation_errors(),
            );
        }else{
            
            $fecha_compra=$_POST['fecha_compra'];
            $date_payment= date("Y-m-d", strtotime($fecha_compra));
            $img_activo=$_POST['imagen_activo'];
            
            $respuesta_img=$this->do_upload($img_activo);       
            
            if($respuesta_img['tipo']==1){
                $array_data_activo=array(
                    'nombre_activo'=>$_POST['name_activo'],
                    'valor_activo'=>$_POST['valor_activo'],
                    'valor_residual'=>$_POST['valor_residual'],
                    'fecha_compra'=>$date_payment,
                    'fecha_creacion'=> date("Y-m-d H:i:s"),
                    'id_usuario'=>$id_usuario,
                    'id_partner'=>$_POST['id_partner'],
                    'id_usario_asignado'=>$_POST['id_user_asig'],
                    'empresa_id'=>$_POST['id_empresa'],
                    'id_factura'=>$_POST['id_factura'],
                    'img_activo'=>$respuesta_img['file_name'],
                );
                $res_activo= $this->CI->load->activos_model->insert_activo($array_data_activo);
                if($res_activo !=0){
                    $respuesta=array(
                        'tipo'=>1,
                        'msg'=>"correctamente",
                        'activo'=>$id_activo,
                    );
                }else{
                    $respuesta=array(
                        'tipo'=>0,
                        'msg'=> "No se logro ingresar el activo",
                    );
                }
            }else{
                $respuesta=array(
                    'tipo'=>0,
                    'msg'=> $respuesta_img['errores'],
                );
            }
        } 
        return $respuesta;
    }
    
    
    public function calcular_depreciacion(){
        
    }
    public function modificar_activo() {
        $id_activo= $this->data_lib['id_activo'];
        $id_usuario= $this->data_lib['id_user'];
        $this->CI->form_validation->set_rules('name_activo','Nombre del activo','required|trim');
        $this->CI->form_validation->set_rules('valor_bruto','Valor bruto del activo','required|trim');
        $this->CI->form_validation->set_rules('valor_residual','Valor Recidual','decimal|trim');
        $this->CI->form_validation->set_rules('fecha_compra','Fecha de compra','required|trim');
        $this->CI->form_validation->set_rules('id_partner','Valor Recidual','trim');
        $this->CI->form_validation->set_rules('id_user_asig','Valor Recidual','trim');
        $this->CI->form_validation->set_rules('id_empresa','Valor Recidual','trim');
        $this->CI->form_validation->set_rules('id_factura','Valor Recidual','trim');
        $this->CI->form_validation->set_message('required', '%s: es requerido');
        $this->CI->form_validation->set_message('decimal','%s debe ser numerico');

        if ($this->CI->form_validation->run() == FALSE) {
            $respuesta=array(
                'tipo'=>0,
                'msg'=> validation_errors(),
            );
        }else{
            $respuesta_img=$this->do_upload();          
            if($respuesta_img['tipo']==1){
                $array_data_activo=array(
                    'nombre_activo'=>$_POST['name_activo'],
                    'valor_activo'=>$_POST['valor_activo'],
                    'valor_residual'=>$_POST['valor_residual'],
                    'fecha_compra'=>$_POST['fecha_compra'],
                    'fecha_creacion'=> date("Y-m-d H:i:s"),
                    'id_usuario'=>$id_usuario,
                    'id_partner'=>$_POST['id_partner'],
                    'id_usario_asignado'=>$_POST['id_user_asig'],
                    'empresa_id'=>$_POST['id_empresa'],
                    'id_factura'=>$_POST['id_factura'],
                    'img_activo'=>$respuesta_img['file_name'],
                );
                $this->CI->load->activos_model->insert_activo();
                $respuesta=array(
                    'tipo'=>1,
                    'msg'=>"correctamente",
                    'activo'=>$id_activo,
                );
            }else{
                $respuesta=array(
                    'tipo'=>0,
                    'msg'=> $respuesta_img['errores'],
                );
                
            }
        }
        
    }
    public function asignar_activo(){
        
    }
    public function eliminar_activo(){
        
    }
    
    function do_upload($input_imagen){
        $config['upload_path'] = './cargas/activos';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $config['file_name'] = 'activo_img';
        $this->CI->load->library('upload', $config);
        if ( !  $this->CI->upload->do_upload($input_imagen)){
            $data['errores'] =  $this->CI->upload->display_errors();
            $data['tipo']=0;
            
        }else{
            $resultado =  $this->CI->upload->data();
            $data['file_name']=$resultado['file_name'];
            $data['tipo']=1;
        }
        return $data;
    }
    
    
}
