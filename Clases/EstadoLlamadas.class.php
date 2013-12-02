<?PHP

include("config.inc.php");
/*
 *
 * esta clase nos permite saber el estado
 * de uso de las llamadas de los usuarios
 *
 */

class EstadoLlamadas {

    public function __construct($id) {
        $this->id = $id;
    }

    /*
      Nos devuelve la ultima llama realizada por el usuario
     */

    public function UltimaLlamada() {
        $BaseDeDatos = new BaseDeDatos(BD);
        $BaseDeDatos->Conectar();
        $wo3[0] = "id_client";
        $oo3[0] = $this->id;
        $fecha=date('Y-m-d H:i:s',time()-(7*24*60*60));
//        echo"SELECT call_start FROM `calls` where id_client='".$this->id."' and call_start>'".$fecha."' order by call_start desc LIMIT 1";
//        echo'<br>';
        $query_calls=mysql_query("SELECT call_start FROM `calls` where id_client='".$this->id."' and call_start>'".$fecha."' order by call_start desc LIMIT 1");
//        $BaseDeDatos->Consultar("calls", "*", $wo3, $oo3, " call_start>'".$fecha."' order by call_start desc LIMIT 1");
//        $BaseDeDatos->Consultar("calls", "*", $wo3, $oo3, " order by call_start desc LIMIT 1");
        $Registro_array = mysql_fetch_array($query_calls);
        return $this->fecha = $Registro_array[call_start];
    }

    public function GetEstado() {

        return $this->ValorEstado($this->UltimaLlamada());
    }

    /*
      Nos devuelve 4 tipos de estado de acuerdo a la cantidad de tiempo
      en la que se realizo la ultima llamada "2010-03-10 11:18:33"
     */

    public function ValorEstado($fecha) {

        $fecha_dia = substr($fecha, 0, -9);
        $fecha_hora = substr($fecha, 11);
        $fecha_hoy = date("Y-m-d");
        $hora_hoy = date("H:i:s");

        if ($fecha_dia == $fecha_hoy) {

            $cantidad_horas = $hora_hoy - $fecha_hora;
            if ($cantidad_horas <= 6) {
                $this->estado = "1";
            } elseif ($cantidad_horas > 6) {
                $this->estado = "2";
            }
        } elseif ($fecha_dia <> $fecha_hoy) {
            $diferencia_dias = $this->diferencia($fecha_hoy, $fecha_dia);
//            $ano = substr($fecha_dia, 0, -6);
//            $mes = substr($fecha_dia, 5, -3);
//            $dia = substr($fecha_dia, 8);
//            $diferencia_dias = date("d") - $dia;
//
//            if ($ano == date("Y") && $mes == date("m")) {
//                if ($diferencia_dias <= 2) {
//                    $this->estado = "3";
//                } elseif ($diferencia_dias > 2 && $diferencia_dias < 7) {
//                    $this->estado = "4";
//                } else {
//                    $this->estado = "5";
//                }
//            } else {
//                $this->estado = "5";
//            }
            //echo $dia." ".$mes." ".$a�o;
            //echo $fecha_hoy-$fecha_dia;
            if ($diferencia_dias <= 2) {
                $this->estado = "3";
            } elseif ($diferencia_dias > 2 && $diferencia_dias < 7) {
                $this->estado = "4";
            } else {
                $this->estado = "5";
            }
        }

        return $this->estado;
    }
    public function ValorEstado2($estado) {
        $fecha_fin=Date('Y-m-d H:i:s');
        $fecha=Date('Y-m-d');
        $hora=Date('H:i:s');

        switch ($estado){
            case 1: //hace 6 horas
                    $fecha=date('Y-m-d H:i:s',time()-(6*60*60));
                    $where=" call_start > '".$fecha."'";
                    break;
            case 2: 
                    
                    break;
            case 3: 
                    break;
            case 4: 
                    break;
            case 5: 
                    break;
                
        }

        if ($fecha_dia == $fecha_hoy) {

            $cantidad_horas = $hora_hoy - $fecha_hora;
            if ($cantidad_horas <= 6) {
                $this->estado = "1";
            } elseif ($cantidad_horas > 6) {
                $this->estado = "2";
            }
        } elseif ($fecha_dia <> $fecha_hoy) {
            $diferencia_dias = $this->diferencia($fecha_hoy, $fecha_dia);
//            $ano = substr($fecha_dia, 0, -6);
//            $mes = substr($fecha_dia, 5, -3);
//            $dia = substr($fecha_dia, 8);
//            $diferencia_dias = date("d") - $dia;
//
//            if ($ano == date("Y") && $mes == date("m")) {
//                if ($diferencia_dias <= 2) {
//                    $this->estado = "3";
//                } elseif ($diferencia_dias > 2 && $diferencia_dias < 7) {
//                    $this->estado = "4";
//                } else {
//                    $this->estado = "5";
//                }
//            } else {
//                $this->estado = "5";
//            }
            //echo $dia." ".$mes." ".$a�o;
            //echo $fecha_hoy-$fecha_dia;
            if ($diferencia_dias <= 2) {
                $this->estado = "3";
            } elseif ($diferencia_dias > 2 && $diferencia_dias < 7) {
                $this->estado = "4";
            } else {
                $this->estado = "5";
            }
        }

        return $this->estado;
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

}

?>