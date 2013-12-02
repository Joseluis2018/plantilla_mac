<?php

class Logeo {
	
	function __construct($Usuario,$Password) {
		
		$this->Usuario			=	$Usuario;
		$this->Password			=	$Password;
	
	}
	function Loguearse(){
		
		$Conexion = new BasedeDatos($ArchivoDeConfiguracion);
		
	}
	function AsignaerSession(){
		
	}
	function Desloguearse(){
		
	}
}

?>