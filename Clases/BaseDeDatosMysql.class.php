<?php
/****************************************************************************
 * 
 * BaseDeDatosMysql.class.php
 * **
 * Autor:					Miguel Angel Cotrina
 * Fecha de Creacion:		10 de junio del 2010
 * Ultima actualizacion:	27 de enero del 2011
 * Version:					1.3
 * Proyecto:				Plantilla Framework Mac-Php
 * 
 * **************************************************************************/
class BaseDeDatosMysql {
	
	public $Servidor;
	public $Usuario;
	public $Password;
	public $BaseDeDatos;
	private $Columnas 	= array();
	private $Registros 	= array();
	
	 /**
	 * La clase BaseDeDatosMysql permite utilizar una Base de Datos
	 * Conectar,Registrar,Modificar,Eliminar y Consultar
	 *
	 * @access public
	 * @param string servidor
	 * @param string usuarios
	 * @param string password
	 * @param string BaseDeDatos
	 * @return Boolean
	 */
	function __construct($servidor, $usuario, $password, $basededatos) {
	
		$this->Servidor 	= $servidor;
		$this->Usuario		= $usuario;
		$this->Password		= $password;
		$this->BaseDeDatos	= $basededatos;
	}
	
	/**
	 * Crea la conexion con la BaseDedatos
	 * verifica si existe errores
	 *
	 * @access public
	 * @return Boolean
	 */
	
	function Conectar(){
		
		if($this->Servidor=="" & $this->Usuarios=="" & $this->BaseDeDatos=="")
		{
			//Mostramos el error de conexion
			
			echo "Error Verifique los datos de conexion<br>";
			echo "Servidor: "		.$this->Servidor."<br>";
			echo "Usuario: "		.$this->Usuarios."<br>";
			echo "Password: "		.$this->Password."<br>";
			echo "Base de Datos: "	.$this->BaseDeDatos;
			exit();
		}	
		else 
		{
			//Realizamos la conexion 
		if(!($link = mysql_connect($this->Servidor,$this->Usuarios)))			
			{
				echo "Error Conectandose a la Base de datos";
				exit();
			}
			if(!(mysql_select_db($this->BaseDeDatos,$link)))
			{
				echo "Error seleccionando la base de datos.";
				exit();
			}
			
		}	
	}
	
	/**
	 * Funcion para registrar una fila en
	 * una tabla de la BaseDeDatos
	 *
	 * @access public
	 * @param string Tabla
	 * @param Array Columnas
	 * @param Array Registros
	 * @return Boolean
	 */
	function Registrar($Tabla,$Columnas,$Registros){
 		
		$CountColumnas = explode(",",$Columnas);
		
		if (count($CountColumnas) == count($Registros)){ //Verificamos que las columnas y registros son iguales
			
			//Generamos la cadena de para el registro de Informacion
			
			$this->cadena_registro .= "insert into ".$Tabla." (".$Columnas.") values ( \n";
			
			for ($i=0;$i<count($Registros);$i++){
				
			$this->cadena_registro .= "'".$Registros[$i]."'";
			
			if($i+1<count($Registros)){$this->cadena_registro .= ",";
			}
		}
		
		$this->cadena_registro .= ")";
                

			
			//realizamos y verificamos si sbe hizo el registro correctamente
			//echo $this->cadena_registro;
			if(mysql_query($this->cadena_registro))
				return "true";		
			else
				return "false";
			
		}
		else {
			echo "El campo columna no coincide con el campo registro, imposible realizar registro";
			exit();
		}
	}
	/**
	 * Funcion para editar una fila en
	 * una tabla de la BaseDeDatos
	 *
	 * @access public
	 * @param string Tabla
	 * @param Array Columnas
	 * @param Array Registros
	 * @param string Where
	 * @param string Valor
	 * @return Boolean
	 */
	function Modificar($Tabla,$Columnas,$Registros,$Where,$Valor){
		
		if (count($Columnas) == count($Registros)){ //Verificamos que las columnas y registros son iguales	
			
			$this->cadena_actualizar = "UPDATE ".$Tabla." SET ";
			
			for($i=0;$i<count($Columnas);$i++){
				
				$this->cadena_actualizar .= $Columnas[$i]." = '".$Registros[$i]."' ";
				
				if($i+1<count($Columnas)){
					$this->cadena_actualizar .= ", ";
				}
			}
			if ($Where!="" & $Valor!=""){
				$this->cadena_actualizar .= " WHERE ".$Where." = '".$Valor."'";
				
				$this->cadena_actualizar .= " LIMIT 1";
			}
			if(mysql_query($this->cadena_actualizar))
				return "True";	
			else 
				return "False";	
		}	
		else
		{
			echo "El campo columna no coincide con el campo registro, imposible realizar registro";
			exit();
		}	
	}
	/**
	 * Funcion para eliminar una fila en
	 * una tabla de la BaseDeDatos
	 *
	 * @access public
	 * @param string Tabla
	 * @param string Where
	 * @param string Valor
	 * @param integer Limite
	 * @return Boolean
	 */
	public function Eliminar($Tabla,$Where,$Valor,$Limite){
		
		$this->cadena_eliminar .= "DELETE FROM ".$Tabla." WHERE ";
		
		$this->cadena_eliminar .= $Where." = '".$Valor."' LIMIT ".$Limite;
		
		//Si Elimina el registro entonces manda un true de lo contrario False
		if(mysql_query($this->cadena_eliminar))
			return "True";
			else 
			return "False";
	}
	
	/**
	 * Funcion para consultar una tabla en
	 * una tabla de la BaseDeDatos
	 *
	 * @access public
	 * @param string Tabla
	 * @param string Columnas
	 * @param array Where
	 * @param array Valor
	 * @param string Opcional
	 * @return Array
	 */
	
	public function Consultar($Tabla,$Columnas,$Where,$Valor,$Opcional){
		
			$this->array_mysql = array();
			if($Where==""){
				$this->cadena_query = "SELECT ".$Columnas." FROM ".$Tabla." ".$Opcional;
				///echo $this->cadena_query;
				$this->array_mysql = mysql_query($this->cadena_query);
				
				return $this->array_mysql;
				
			}
			else{
				
				$this->cadena_query = "SELECT ".$Columnas." FROM ".$Tabla." WHERE ";
				
				if(count($Where)==count($Valor)){
					for($i=0;$i<count($Where);$i++){
						
						if($Valor[$i]=="*"){
								$this->cadena_query.="";
						}
						else{
							$this->cadena_query .= $Where[$i]." = '".$Valor[$i]."' and ";	
						}
					}					
				$this->cadena_query = substr($this->cadena_query,0,-4);
				
				//agregamos los datos opcional
				
				if($Opcional<>""){$this->cadena_query .= " ".$Opcional;}
				//echo $this->cadena_query;
				$this->array_mysql = mysql_query($this->cadena_query);
				
				
				
			}			
			else {
				echo "Los valores  de where y Valor tienen que ser iguales";
			}
		}			
	}
	public function Query(){
		return $this->array_mysql;
	}	
	public function Numero_filas(){
		return mysql_num_rows($this->array_mysql);
	}
	public function ultimoid(){
		return mysql_insert_id();	
	}
}
?>