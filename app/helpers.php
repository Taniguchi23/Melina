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

function formato_fecha_inicio(){
    $fecha_actual = \Carbon\Carbon::now();
    $fecha_normal =  strtotime($fecha_actual);
    $mes_numero = round(date("m",$fecha_normal))-1;
    $dia_numero = date("d",$fecha_normal);
    $dia_letra = date("l",$fecha_normal);
    $dia = [
        'Monday' => "Lunes",
        'Tuesday' => "Martes",
        'Wednesday' => "Miércoles",
        'Thursday' => "Jueves",
        'Friday' => "Viernes",
        'Saturday' => "Sábado",
        'Sunday' => "Domingo",
    ];
    $mes = ["Enero", "Febrero", "Marzo", "Junio","Julio","Agosto","Setiembre","Noviembre","Diciembre"];

    $anio = date("Y", $fecha_normal);
    $formato_actual= " ".$dia[$dia_letra]." , ".$dia_numero." de ".$mes[$mes_numero]." del ".$anio;

    return $formato_actual;
}


?>
