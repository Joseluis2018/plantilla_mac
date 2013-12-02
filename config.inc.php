<?PHP
define("HOME",realpath(dirname(__FILE__)));
//echo HOME;
//define("HOME","http://localhost/Facturacion");
define("MODELO",HOME."/Aplicacion/modelo");
define("CONTROLADOR",HOME."/Aplicacion/controlador");
define("VISTA",HOME."/Aplicacion/vista");
define("IMAGENES",HOME."/imagenes");
define("CLASES",HOME."/Clases");
define("PRESENTACION",HOME."/Presentacion");
define("BD",MODELO."/Conexion.tpl");
error_reporting(E_ALL & ~E_NOTICE); 
//Manejo de Autocarga de Clases con Verificacion
//para que solo se ejecute una vez
if(!(function_exists("__autoload"))){
	function __autoload($class_name) 
		{
			require_once CLASES.'/'.$class_name . '.class.php';
		}
	}


?>