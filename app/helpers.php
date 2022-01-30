<?php


function formato_fecha($fecha){
    $fecha_normal =  strtotime($fecha);
    $mes_numero = round(date("m",$fecha_normal))-1;
    $dia = date("d",$fecha_normal);
    $anio = date("Y", $fecha_normal);

     $mes = ["enero", "febrero", "marzo", "junio","julio","agosto","setiembre","noviembre","diciembre"];

    $fecha_formato =  $dia." de ".$mes[$mes_numero]. " del ".$anio;
    return $fecha_formato;
}


?>
