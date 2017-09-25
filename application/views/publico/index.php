<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/js/loading.js"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#formularioLogin').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: $(this).attr("action"), //action del formulario, ej:
                        type: $(this).attr("method"), //el método post o get del formulario
                        data: $(this).serialize(),
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
                            var res = $.parseJSON(data);
                            if (res.tipo == 1) {
                                location.href = "<?php echo base_url(); ?>index.php/sistema";
                            } else {
                                $("#errors").html(res.res);
                            }
                            $.unblockUI();
                        },
                    });
                });
            });
        </script>

    <body>
        <?php $this->load->view("publico/elementos/menu"); ?>

        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">Sistema de contabilidad</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div id="errors" class="alert-danger"></div>
                        <form role="form" id="formularioLogin" method="POST" action="<?php echo base_url(); ?>index.php/loggin">
                            <div class="form-group has-feedback">
                                <label class="control-label" for="InputEmail1">Correo Electrónico</label>
                                <input class="form-control" id="InputEmail1" placeholder="Enter email" type="email" name="usuario">
                                <span class="fa fa-2x fa-user form-control-feedback text-muted"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label class="control-label" for="InputPassword1">Contraseña</label>
                                <input class="form-control" id="InputPassword1" placeholder="Password" type="password" name="password">
                                <span class="fa fa-2x fa-eye-slash form-control-feedback text-muted"></span>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-success">Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view("publico/elementos/footer"); ?>
    </body>
</html>
