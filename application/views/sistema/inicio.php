<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
        <title>Sistema contable</title>

    </head>
    <body>
        <?php $this->load->view('sistema/elementos/menu'); ?>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="text-center">Sistema Contable &nbsp;vesion 1.0</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a class="btn btn-block btn-lg btn-success">Proveedores</a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="<?php echo base_url(); ?>index.php/activos" class="btn btn-block btn-lg btn-success">Activos Fijos</a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn btn-block btn-lg btn-success">Productos</a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn btn-block btn-lg btn-success">Bancos</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a class="btn btn-block btn-lg btn-success">Empresas</a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn btn-block btn-lg btn-success">Usuarios</a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn btn-block btn-lg btn-success">Facturas de proveedores</a>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn btn-block btn-lg btn-success">Estadisticas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('sistema/elementos/footer'); ?>
    </body>

</html>
