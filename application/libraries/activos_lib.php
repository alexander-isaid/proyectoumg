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
        $id_user= $this->data_lib['id_user'];
        $this->CI->form_validation->set_rules('name_activo','Nombre del activo','required|trim');
        $this->CI->form_validation->set_rules('valor_bruto','Valor bruto del activo','required|trim');
        $this->CI->form_validation->set_rules('valor_residual','Valor Recidual','decimal|trim');
        $this->CI->form_validation->set_rules('fecha_compra','Fecha de compra','required|trim');
        $this->CI->form_validation->set_rules('proveedor','Proveedor','trim');
        $this->CI->form_validation->set_rules('id_empresa','Empresa','trim');
        $this->CI->form_validation->set_rules('factura','Factura','trim');
        $this->CI->form_validation->set_message('required', 'El campo %s: es requerido');
        $this->CI->form_validation->set_message('decimal','El campo %s debe ser numerico');
        
        if ($this->CI->form_validation->run() == FALSE) {
            $respuesta=array(
                'tipo'=>0,
                'msg'=> validation_errors(),
            );
        }else{
            
            $fecha_compra=$_POST['fecha_compra'];
            $date_payment= date("Y-m-d", strtotime($fecha_compra));
            if(!empty($_FILES[ 'userfile' ][ 'name' ])){
                $respuesta_img=$this->do_upload();  
            }else{
                $respuesta_img['tipo']=1;
                $respuesta_img['file_name']="";
            }
            if($respuesta_img['tipo']==1){
                $array_data_activo=array(
                    'nombre_activo'=>$this->CI->input->post('name_activo'),
                    'valor_activo'=>$this->CI->input->post('valor_bruto'),
                    'valor_residual'=>$this->CI->input->post('valor_residual'),
                    'fecha_compra'=>$date_payment,
                    'fecha_creacion'=> date("Y-m-d H:i:s"),
                    'id_usuario'=>$id_user,
                    'id_partner'=>$this->CI->input->post('proveedor'),
//                    'id_usario_asignado'=>$this->CI->input->post('id_user_asig'),
                    'empresa_id'=>$this->CI->input->post('id_empresa'),
                    'id_factura'=>$this->CI->input->post('factura'),
                    'img_activo'=>$respuesta_img['file_name'],
                );
                $res_activo= $this->CI->activos_model->insert_activo($array_data_activo);
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
            if(!empty($_FILES['userfile']['name'])) {
                $respuesta_img=$this->do_upload();
            }else{
                $respuesta_img['tipo']==1;
            }
           
            
            
            
            
            
            
            
            
            
            
            if($respuesta_img['tipo']==1){
                $array_data_activo=array(
                    'nombre_activo'=>$this->CI->input->post('name_activo'),
                    'valor_activo'=>$this->CI->input->post('valor_activo'),
                    'valor_residual'=>$this->CI->input->post('valor_residual'),
                    'fecha_compra'=>$this->CI->input->post('fecha_compra'),
                    'fecha_creacion'=> date("Y-m-d H:i:s"),
                    'id_usuario'=>$id_usuario,
                    'id_partner'=>$this->CI->input->post('id_partner'),
                    'id_usario_asignado'=>$this->CI->input->post('id_user_asig'),
                    'empresa_id'=>$this->CI->input->post('id_empresa'),
                    'id_factura'=>$this->CI->input->post('id_factura'),
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
    
    function do_upload(){
        $file_name ='activo_'.time().'.png';
        $config['upload_path'] = './cargas/activos/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $config['file_name'] = $file_name;
        $this->CI->load->library('upload', $config);     
        $this->CI->upload->initialize($config);
            if (!$this->CI->upload->do_upload()) {
                $data['errores'] =  $this->CI->upload->display_errors();
                $data['tipo']=0;
            } else {
                $resultado = $this->CI->upload->data();
                $data['file_name']=$resultado['file_name'];
                $data['tipo']=1;
            }
        return $data;
    }
    
    
}
