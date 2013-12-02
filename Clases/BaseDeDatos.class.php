<?php
include("BaseDeDatosMysql.class.php");
include("EditorDeArchivos.class.php");

class BaseDeDatos extends BaseDeDatosMysql {
	
	function __construct($ArchivoDeConfiguracion) {
		
		$OFile = new EditorDeArchivos($ArchivoDeConfiguracion);
		
		$this->Servidor 	= $OFile->LeerFila(0);
		$this->Usuarios		= $OFile->LeerFila(1);
		$this->Password		= $OFile->LeerFila(2);
		$this->BaseDeDatos	= $OFile->LeerFila(3);
	}
}
?>