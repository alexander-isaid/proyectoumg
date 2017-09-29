<html>
  
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
        <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
        <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/loading.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
        
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
            
            var productos=[
                {Name:"", Id:"" },
                {Name:"Servidor HP", Id:1},
            ]
               
            var  countries =[
                    { Name: "", Id: 0 },
                    { Name: "Iva por pagar 12%", Id: 1 },

                ];
 
            
            
            $(document).ready(function(){
                $("#jsGrid").jsGrid({
                    width: "100%",
                    height: "400px",

                    inserting: true,
                    editing: true,
                    sorting: true,
                    paging: true,
                     
                 

                    fields: [
                        { name: "Producto", type: "select", items: productos, valueField: "Id", textField: "Name", width: 75, validate: "required" },
                        { name: "Cantidad", type: "number", width: 50, validate: "required" },
                        { name: "Descripcion", type: "text", width: 200 },
                        { name: "Impuesto", type: "select", items: countries, valueField: "Id", textField: "Name" },
                        { name: "Importe", type: "number", width: 50  },
                        { type: "control" }
                    ]
                });
            });
        </script>
    </head>   
    <body>
        <?php echo $this->load->view('publico/elementos/menu'); ?>   
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 contenteditable="true" class="text-center">Factura de proveedor</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <form  class="form-horizontal" id="factura_proveedor">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">Proveedor</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <select name="proveedor" id="proveedor" class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">No. factura proveedor</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="no_factura_pro" id="no_factura_pro" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">Plazo de pago</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="plazo_pago" id="plazo_pago" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">Fecha de factura</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" id="fecha_factura" name="fecha_factura" class="form-control fecha">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">Fecha de vencimiento</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="no_factura_pro" id="no_factura_pro" class="form-control fecha">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div id="jsGrid"></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-sm-9"></div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">Sub total</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="subtotal" id="subtotal" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">Impuesto</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="impuesto" id="impuesto" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <label class="control-label">Total</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="total" id="total" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->load->view('sistema/elementos/footer'); ?>   
        
    </body>


          