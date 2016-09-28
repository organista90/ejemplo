<?php
require_once '../modelo/modelo_audiencia.php';

$objeto = new ModelAudiencia();

if (isset($_REQUEST['id_region']) || isset($_REQUEST['id_fi']) || isset($_REQUEST['id_ff'])) {
    echo $objeto->__datos_filtros($_REQUEST['id_region'], $_REQUEST['id_fi'], $_REQUEST['id_ff']);
} else {
    echo $objeto->__datos_filtros(0, 0, 0);
}


