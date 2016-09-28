<?php
require_once './db/conexion.php';
    session_start();
    $_SESSION['d'] = 'select * from agendaconsulta, distrito, region where agendaconsulta.agendaconsultadistrito=distrito.distritoid and distrito.distritoregion=regionid';
    $objeto = new Conexion();
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <link rel="stylesheet" href="css/jquery.datetimepicker.css">
        <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">


        <script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"</script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"</script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"</script>


      
    </head>
    <body>
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-lg-4 col-lg-pull-1"></div> 
                        <div class="col-xs-4 col-sm-4 col-lg-4 app-encabezado" ><center><h3>LISTADO AUDIENCIAS</h3></center></div>
                     </div>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">LISTADO</a></li>
                        <li><a class="" data-toggle="tab" href="#menu1">GRAFICAS</a></li>
                    </ul><br><br>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label app-filtros">Región</label>
                                                <div class="col-lg-9">
                                                    <select class="form-control" id="idregion" onchange="datos_audiencia()">
                                                        <option value="0" selected="">Todos</option>
                                                        <option value="1">Acapulco</option>
                                                        <option value="2">Centro</option>
                                                        <option value="3">Costa Chica</option>
                                                        <option value="4">Costa Grande</option>
                                                        <option value="5">Montaña</option>
                                                        <option value="6">Norte</option>
                                                        <option value="7">Tierra Caliente</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-lg-pull-0">
                                <div class="form-inline">
                                    <div class="form-group ">
                                        <label class="app-filtros">Fecha Inicial</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
                                            <input type="date" id="fecha_inicial" class="form-control" placeholder="Fecha Inicial" onchange="datos_audiencia()">
                                        </div>
                                    
                                    </div>
                                    <div class="form-group">
                                        &nbsp;&nbsp;<label class="app-filtros">Fecha Final</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
                                            <input type="date" id="fecha_final" class="form-control" placeholder="Fecha Final" onchange="datos_audiencia()">
                                        </div>
                                    </div> <!--<button class="btn" id="pdf">PDF</button>-->

                                </div>

                            </div>
                              
                        </div> 
                    </div>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="table-responsive"> 
                                <table id="tabla_audiencias" class="table table-striped table-bordered app-tabla" cellspacing="0" width="100%">
                                    <thead> 
                                        <tr>
                                            <th>No.</th>
                                            <th>Distrito</th>
                                            <th>Lugar</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Sala</th>
                                            <th>Carpeta Judicial</th>
                                            <th>Tipo Audiencia</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <center>
                                <div id="PieChart"></div>
                           </center>
                        </div>
                     
                      </div>
                </div>
                <div class="panel-footer app-footer2">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-lg-4 col-lg-pull-1"></div> 
                        <div class="col-xs-4 col-sm-4 col-lg-4" ><center><h6>Ejemplo de prueba<br>Esto solo es un ejemplo...</h6></center></div>
                        <div class="col-xs-4 col-sm-4 col-lg-4 col-lg-push-1"></div>
                     </div>
                </div>
            </div>
        </div>
        
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/vendor/jquery.datetimepicker.full.js"></script>
        <script type="text/javascript" src="js/vendor/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/vendor/dataTables.bootstrap.min.js"></script>
   
        <script type="text/javascript">
            $('#tabla_audiencias').DataTable({
                "sPaginationType": "full_numbers",
                "processing": true,
                "language": {
                    "url": "./js/vendor/spanish.json"
                },
                
                "ajax": "./controlador/controlador_datos.php",					
                    "columns": [
                        { "data": "id" },
                        { "data": "ndistrito" },
                        { "data": "udistrito" },
                        { "data": "acf" },
                        { "data": "ach" },
                        { "data": "acs" },
                        { "data": "acnc" },
                        { "data": "acta" }
                    ],


            });


        </script>
        <script src="js/highcharts/js/highcharts.js"></script>
        <script src="js/highcharts/js/modules/exporting.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
