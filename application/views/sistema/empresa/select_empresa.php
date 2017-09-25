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
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="<?php echo base_url(); ?>js/loading.js"></script>
        <title>Seleccion de empresa</title>
        <script type="text/javascript">
            $(document).ready(function (){
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/sistema/get_empresas",
                    type: 'POST',
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
            });
        </script>
    </head>
    <body>
        <?php $this->load->view('sistema/elementos/menu') ?>
        <h1>Seleccione una empresa</h1>
        <?php $this->load->view('sistema/elementos/footer'); ?>
    </body>
</html>
