<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html">
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/additional-methods.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/loading.js"></script>
        <title>Nueva empresa</title>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#empresaForm").validate({
                    debug: true,
                    errorClass: 'has-error',
                    validClass: 'has-success',
                    // errorElement: 'div',
                    rules: {
                        nom_comercial: {
                            required: true,
                        },
                        telefono: {
                            digits: true,
                            minlength: 8,
                        },
                        num_nit:{
                            digits: true,
                            minlength:8,
                        }
                    },
                    messages: {
                        nom_comercial: {
                            required: "El campo  es requerido",
                        },
                        num_nit: {
                            required: "El campo  es requerido",
                        },
                    },
                    success: function(element) {
                        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                    },
                    highlight: function(element) {
                        $(element).closest('.form-group').addClass('has-error');
                    },
                    unhighlight: function(element) {
                        $(element).closest('.form-group').removeClass('has-error');
                    },
                    errorPlacement: function(error, element) {
                        if (element.hasClass('.form-group')) {
                            element = element.parent();
                        }
                    },
                    submitHandler: function(form) {
                        $.ajax({
                            url:$(form).attr('action'),
                            type:$(form).attr('method'),
                            data:$(form).serialize(),
                            timeout: 5000,
                            error: function(jqXHR, textStatus, errorThrown) {
                                var errorConcat = "\n Porfavor intente nuevamente"
                                switch (textStatus) {
                                    case "timeout":
                                        errorConcat = "El sistemas esta tardeando mas de lo esperado " + errorConcat;
                                        break;
                                    case "error" :
                                        errorConcat = "Algo salío mal " + errorConcat;
                                        break;

                                    case "abort" :
                                        errorConcat = "Error de Conexión " + errorConcat;
                                        break;

                                    case "parsererror" :
                                        errorConcat = "Lo sentimos hubo un problema " + errorConcat;
                                        break;
                                 }
                                console.log("Detalle de error:");
                                console.log(jqXHR);
                                console.log("return error HTTP :");
                                console.log(errorThrown);
                                alert(errorConcat);
                                $.unblockUI();
                            },
                            beforeSend: function() {
                                $.blockUI({
                                    message: '<img alt="contabilidad" src="<?php echo base_url(); ?>img/loading.gif" height="100" width="100"/>',
                                    css: {
                                        backgroundColor: '#FFF',
                                    }
                                });
                             },
                            success: function(data) {
                                var json_obj = $.parseJSON(data); 
                                $.unblockUI();
                            }
                        });
                    }
                }); 
            });
        </script>
        
        
    </head>
    <body>
        <?php $this->load->view('sistema/elementos/menu'); ?>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section">
                            <div class="container">
                                <form role="form" id="empresaForm" method="POST" action="<?php echo base_url();?>index.php/sistema/nueva_empresa">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h1 class="text-center">Ingrese datos de su empresa</h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label class="control-label">Nombre comercial</label>
                                                <input class="form-control" id="nom_comercial" name="nom_comercial" placeholder="Nombre comercial" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Razon social</label>
                                                <input class="form-control" id="razon_social" name="razon_social" placeholder="Razon social" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Dirección</label>
                                                <input class="form-control" id="direccion" name="direccion" placeholder="Dirección" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Ciudadad</label>
                                                <input class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Telefóno</label>
                                                <input class="form-control" type="text" placeholder="Telefono" name="telefono" id="telefono">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Correo electronico</label>
                                                <input class="form-control" type="text" name="email" placeholder="Correo electronico">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">NIT</label>
                                                <input class="form-control" type="text" placeholder="NIT" id="num_nit" name="num_nit">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Pagina web</label>
                                                <input class="form-control" type="text"  id="web_sitie" name="web_site" placeholder="Pagina web">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <input type="submit" class="btn btn-lg btn-primary" value="Crear">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('sistema/elementos/footer'); ?>
    </body>
</html>
