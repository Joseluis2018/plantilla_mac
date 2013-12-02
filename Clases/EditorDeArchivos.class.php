<?php
/****************************************************************************
 * 
 * EditorDeArchivos.class.php
 * 
 * Autor:					Miguel Angel Cotrina
 * Fecha de Creacion:		26 de enero del 2011
 * Ultima actualizacion:	27 de enero del 2011
 * Version:					1.0
 * Proyecto:				Plantilla Framework Mac-Php
 * 
 * **************************************************************************/
class EditorDeArchivos {
	
	private $Archivo;
	/**
	 * La clase EditorDeArchivos permite el manejo de archivos
	 * de forma sencilla y rapida
	 *
	 * @access public
	 * @param file archivo
	 * @return Boolean
	 */
	function __construct($Archivo) {
	
		if(file_exists($Archivo)){
		 	$this->Archivo = ($Archivo);
		 }
		 else{
		 	echo "El fichero seleccionado no existe";
		 	exit();
		 }		 
	}
	/**
	 * Devuelve el contenido de una fila
	 * Las filas se cuentan desde 0
	 *
	 * @access public
	 * @param integer fila
	 * @return String
	 */
	function LeerFila($fila){
		$FileArchivo = file($this->Archivo);
		return str_replace("\r\n","",$FileArchivo[$fila]);
	}
	/**
	 * Permite editar el contenido de una fila
	 * Las filas se cuentan desde 0
	 *
	 * @access public
	 * @param integer fila
	 * @param string texto
	 * @return Boolean
	 */
	function EditarFila($fila,$texto){
		//leemos el fichero
		$FileArchivo = file($this->Archivo);
		//Abrimos el archivo
		$OpenArchivo = fopen($this->Archivo, 'w');
		//Contamos las filas
		$NumeroDeFilas = count($FileArchivo);
		//Ingresamos el Contenido en el archivo
		for($i=0;$i<$NumeroDeFilas;$i++){
			
			if($i==$fila){
				fwrite($OpenArchivo, $texto."\r\n");
			}else{
				fwrite($OpenArchivo, $FileArchivo[$i]);
			}
			
		}
		//Cerramos el archivo
		fclose($OpenArchivo);

	}
	/**
	 * Permite eliminar el contenido de una fila
	 * Las filas se cuentan desde 0
	 *
	 * @access public
	 * @param integer fila
	 * @return Boolean
	 */
	function EliminarFila($fila){
		//leemos el fichero
		$FileArchivo = file($this->Archivo);
		//Abrimos el archivo
		$OpenArchivo = fopen($this->Archivo, 'w');
		//Contamos las filas
		$NumeroDeFilas = count($FileArchivo);
		//Ingresamos el Contenido en el archivo
		for($i=0;$i<$NumeroDeFilas;$i++){
			
			if($i!=$fila){
				fwrite($OpenArchivo, $FileArchivo[$i]);
			}
		}
		//Cerramos el archivo
		fclose($OpenArchivo);
		
	}
	/**
	 * Permite insertar el contenido en una fila
	 * Las filas se cuentan desde 0
	 *
	 * @access public
	 * @param integer fila
	 * @param string texto
	 * @return Boolean
	 */
	function InsertarFila($fila,$texto){
		//leemos el fichero
		$FileArchivo = file($this->Archivo);
		//Abrimos el archivo
		$OpenArchivo = fopen($this->Archivo, 'w');
		//Contamos las filas
		$NumeroDeFilas = count($FileArchivo);
		//Ingresamos el Contenido en el archivo
		for($i=0;$i<$NumeroDeFilas;$i++){
			
			if($i!=$fila){
				fwrite($OpenArchivo, $FileArchivo[$i]);
			}
			else{
				fwrite($OpenArchivo, $texto."\r\n");
				fwrite($OpenArchivo, $FileArchivo[$i]);
			}
		}
		//Cerramos el archivo
		fclose($OpenArchivo);
	}
	/**
	 * Devuelve el numero de filas
	 *
	 * @access public
	 * @return Integer
	 */
	function ContarFilas(){
		return count(file($this->Archivo));
	}
	/**
	 * Devuelve el contenido total del archivo
	 *
	 * @access public
	 * @return String
	 */
	function MostrarContenido(){
		//leemos el fichero
		$FileArchivo = file($this->Archivo);
		//Contamos las filas
		$NumeroDeFilas = count($FileArchivo);
		//Ingresamos el Contenido en el archivo
		for($i=0;$i<$NumeroDeFilas;$i++){
			
			$Contenido .= $FileArchivo[$i];

		}
		return $Contenido;
	}
	/**
	 * Permite editar el contenido total del archivo
	 *
	 * @access public
	 * @param string NuevoContenido
	 * @return Boolean
	 */
	function ModificarContenido($NuevoContenido){
		//Abrimos el archivo
		$OpenArchivo = fopen($this->Archivo, 'w');
		//Registramos el nuevo contenido
		fwrite($OpenArchivo, $NuevoContenido);
		//Cerramos el archivo
		fclose($OpenArchivo);
	}
}

?>