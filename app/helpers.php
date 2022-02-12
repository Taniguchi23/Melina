<?php


function formato_fecha($fecha){
    $fecha_normal =  strtotime($fecha);
    $mes_numero = round(date("m",$fecha_normal))-1;
    $dia = date("d",$fecha_normal);
    $anio = date("Y", $fecha_normal);

     $mes = ["enero", "febrero", "marzo","abril","mayo", "junio","julio","agosto","setiembre","octubre","noviembre","diciembre"];

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
    $mes = ["enero", "febrero", "marzo","abril","mayo", "junio","julio","agosto","setiembre","octubre","noviembre","diciembre"];

    $anio = date("Y", $fecha_normal);
    $formato_actual= " ".$dia[$dia_letra]." , ".$dia_numero." de ".$mes[$mes_numero]." del ".$anio;

    return $formato_actual;
}

function mes_anterior(){
    $fecha = \Carbon\Carbon::now();
    $fecha_normal =  strtotime($fecha);
    $mes_numero = round(date("m",$fecha_normal))-1;// febrero me da igual a 1
    $anio = date("Y", $fecha_normal);
    $mes = ["enero", "febrero", "marzo","abril","mayo", "junio","julio","agosto","setiembre","octubre","noviembre","diciembre"];
    if ($mes_numero == 0){
        $anio = intval($anio);
        $anio = $anio-1;
        $fecha_slug = $mes[11].'-'.$anio;

    }else{
        $mes_anterior = $mes_numero-1;
        $fecha_slug = $mes[$mes_anterior].'-'.$anio;
    }
    return $fecha_slug;
}
 function mes_anterior_nombre(){
     $fecha = \Carbon\Carbon::now();
     $fecha_normal =  strtotime($fecha);
     $mes_numero = round(date("m",$fecha_normal))-1;
     $anio = date("Y", $fecha_normal);
     $mes = ["Enero", "Febrero", "Marzo","Abril","Mayo", "Junio","Julio","Agosto","Setiembre","Octubre","Noviembre","Diciembre"];
     if ($mes_numero == 0){
         $nombremes = $mes[11].' del '.$anio;
     }else{
         $nombremes = $mes[$mes_numero-1].' del '.$anio;
     }

     return $nombremes;
 }

 function nombre_distrito($slug){
    $distrito = \App\Models\Distrito::where('url_seo',$slug)->first();
    return $distrito->nombre;
 }

 function color ($region_nombre){
    if ($region_nombre == 'Lima Norte'){
        $color= '#FFE7E6';
        return $color;
    }else{
        if ($region_nombre == 'Lima Este'){
            $color = '#E1FCFF';
        return $color;
        }else{
            if ($region_nombre == 'Lima Centro'){
                $color = '#FFF9C6';
                return $color;
            }else{
                if ($region_nombre == 'Lima Sur'){
                    $color = '#F4FFD5';
                    return $color;
                }else{
                    $color = '#adbff1';
                    return $color;
                }
            }
        }

    }
 }
?>
