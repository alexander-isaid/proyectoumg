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
        <title>Editar activo fijo</title>
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
                                        <h1 class="text-center">Editar un activos fijo</h1>
                                    </div>
                                </div>
                                <form id="form_activos">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Nombre del activo</label>
                                                <input class="form-control" id="name_activo"
                                                placeholder="Ejemplo Telefono motorola" type="text" name="name_activo">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="exampleInputEmail1">Valor bruto</label>
                                                <input class="form-control" id="exampleInputPassword1"
                                                type="text">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Valor recidual</label>
                                                <input class="form-control" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Fecha de compra</label>
                                                <input class="form-control fecha" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Proveedor</label>
                                                <select name="proveedor" id="proveedor" class="form-control">
                                                    <option>Seleccione un proveedor</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Factura</label>
                                                <select name="factura" id="factura" class="form-control">
                                                    <option>Selecciona un factura</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                        </div>
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
