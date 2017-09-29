<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/loading.js"></script>
        <title>Activos Fijos</title>
        
        <script type="text/javascript">
            $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '<Ant',
                nextText: 'Sig>',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'MiÃ©rcoles', 'Jueves', 'Viernes', 'SÃ¡bado'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'MiÃ©', 'Juv', 'Vie', 'SÃ¡b'],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'SÃ¡'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);
            $(function() {
                $(".fecha").datepicker();
            });
        </script>
        
        <script type="text/javascript">
            $(document).on('submit', '#form_activos', function(e) {
                e.preventDefault();
                $("#erroress").html('');
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url: '<?php echo base_url();?>index.php/activos/crear_activo',
                    type: 'POST',
                    data: formData, //obtenemos todos los datos del formulario
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    timeout: 60000,
                    error: function(x, t, m) {
                        if (t === 'timeout') {
                            alert('Lo sentimos, hubo un problema de conexión, porfavor intentalo de nuevo');
                        } else {
                            alert('Lo sentimos, hubo un problema de conexión, porfavor intentalo de nuevo');
                        };
                        $.unblockUI();
                    },
                    beforeSend: function() {
                        $.blockUI({
                            message: '<img alt="contabilidad" src="<?php echo base_url(); ?>img/loading.gif" height="100" width="100"/>',
                            css: {
                                border: 'none',
                                padding: '15px',
                                backgroundColor: '#000',
                                '-webkit-border-radius': '10px',
                                '-moz-border-radius': '10px',
                                opacity: .5,
                                color: '#fff'
                            }
                        });
                    },
                    success: function(data) {
                        var json_obj = $.parseJSON(data);
                        if(json_obj.tipo==1){
                            alert(json_obj.msg);
                        }else {
                            $('#errors').append(json_obj.msg).addClass('alert alert-danger');
                        }

                        $.unblockUI();
                    }
                });
            });
        </script>
        
    </head>
    <body>
        <?php echo $this->load->view('publico/elementos/menu'); ?>   
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="text-center">Activos Fijos</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="errors"></div>
                                    </div>
                                    
                                </div>
                                <form id="form_activos" method="POST" action="<?php echo base_url(); ?>index.php/activos/crear_activo">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="thumbnail">
                                                    <img src="<?php echo base_url();?>img/no_image.png" class="img-responsive" width="25%" >
                                                    <div class="caption">
                                                        <input type="file" name="userfile" id="imagen_activo">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Nombre del activo</label>
                                                <input class="form-control" id="name_activo"
                                                placeholder="Ejemplo Telefono motorola" type="text" name="name_activo">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="exampleInputEmail1">Valor bruto</label>
                                                <input class="form-control" id="valor_bruto" name="valor_bruto" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Valor recidual</label>
                                                <input class="form-control" type="text" name="valor_residual" id="valor_residual">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Fecha de compra</label>
                                                <input class="form-control fecha" type="text" name="fecha_compra" id="fecha_compra">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Proveedor</label>
                                                <select name="proveedor" id="proveedor" class="form-control">
                                                    <option value="">Seleccione un proveedor</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Factura</label>
                                                <select name="factura" id="factura" class="form-control">
                                                    <option value="">Selecciona un factura</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                        </div>
                                    </div>
                                    <div clas="col-offeset-5 col-md-2">
                                        <input type="submit" value="nuevo activo" class="btn btn-lg btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->load->view('sistema/elementos/footer'); ?>   
    </body>
</html>
