<?php
include("config.inc.php");

class Estrellas {

    function __construct($id) {
        $this->id = $id;
    }
    
	public function diferencia($actual, $ultimo) {
    $dia1 = substr($ultimo, 8, 2);
    $mes1 = substr($ultimo, 5, 2);
    $ano1 = substr($ultimo, 0, 4);

    //defino fecha 2
    //$actual = date("Y-m-d");
    $dia2 = substr($actual, 8, 2);
    $mes2 = substr($actual, 5, 2);
    $ano2 = substr($actual, 0, 4);

    //calculo timestam de las dos fechas
    $timestamp1 = mktime(0, 0, 0, $mes1, $dia1, $ano1);
    $timestamp2 = mktime(4, 12, 0, $mes2, $dia2, $ano2);

    //resto a una fecha la otra
    $segundos_diferencia = $timestamp1 - $timestamp2;
    //echo $segundos_diferencia;
    //convierto segundos en días
    $dias_diferencia = $segundos_diferencia / (60 * 60 * 24);

    //obtengo el valor absoulto de los días (quito el posible signo negativo)
    $dias_diferencia = abs($dias_diferencia);

    //quito los decimales a los días de diferencia
    $dias_diferencia = floor($dias_diferencia);
    return $dias_diferencia;
}

	
	public function resta_fechas($fecha, $ndias) {
    if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/", $fecha))
        list($ano, $mes, $dia) = explode ("-", $fecha);
    $nueva = mktime(0, 0, 0, $mes, $dia, $ano) - $ndias * 24 * 60 * 60;
    $nuevafecha = date("Y-m-d", $nueva);
    return ($nuevafecha);
}
	
    public function obtenerEstrella() {
        $id_client = $this->id;
        $fecha = Date('Y-m-d');
        $fechaIni = $this->resta_fechas($fecha, 15);
        $query = "SELECT sum(cost) as costo FROM calls c where date(call_start) between '" . $fechaIni . "' and '" . $fecha . "' and  id_client='$id_client';";

        $var = mysql_fetch_array(mysql_query($query));
        $queryFecha1 = mysql_fetch_array(mysql_query("SELECT date(call_start) as fecha1 FROM calls c where date(call_start) between '" . $fechaIni . "' and '" . $fecha . "' and  id_client='$id_client' ORDER BY id_call DESC LIMIT 1;"));
        $queryFecha2 = mysql_fetch_array(mysql_query("SELECT date(call_start) as fecha2 FROM calls c where date(call_start) between '" . $fechaIni . "' and '" . $fecha . "' and  id_client='$id_client' ORDER BY id_call ASC LIMIT 1;"));

        $fecha1 = $queryFecha1['fecha1'];
        $fecha2 = $queryFecha2['fecha2'];

        $cantDias = $this->diferencia($fecha1, $fecha2);

//        $query2 = mysql_query("SELECT sum(cost) as costo FROM calls c where date(call_start)>='" . $fechaIni . "' and  id_client='$id_client'  group by date(call_start);");
//        $var2 = mysql_num_rows($query2) . ' ';
        if ($cantDias >= 0) {
            $cantDias+=1;
            $pdd = number_format($var['costo'] / $cantDias, 2);
        } else {
            $pdd = '0.00';
        }
        if ($pdd < 1) {
            $estrella = 0;
        } else {
            if ($pdd <= 5) {//1-5
                $estrella = 1;
            } else {
                if ($pdd <= 10) {
                    $estrella = 2;
                } else {
                    if ($pdd <= 15) {
                        $estrella = 3;
                    } else {
                        if ($pdd <= 23) {
                            $estrella = 4;
                        } else {
                            $estrella = 5;
                        }
                    }
                }
            }
        }
        return $estrella;
    }

}

?>
