<?php

require_once '../modelo/modelo_audiencia.php';

$objeto = new ModelAudiencia();
echo $objeto->__generar_estadistica();