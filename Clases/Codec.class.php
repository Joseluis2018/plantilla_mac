<?PHP 
/****************************************************************************
 * 
 * BaseDeDatosMysql.class.php
 * 
 * Autor:					Miguel Angel Cotrina
 * Fecha de Creacion:		10 de marzo del 2011
 * Ultima actualizacion:	10 de marzo del 2011
 * Version:					1.0
 * Proyecto:				Plantilla Framework Mac-Php
 * 
 * **************************************************************************/
/****************************************************************************
*
*  Valores de los codecs
*  
*  3211331
*  G723
*  g729
*  
*  1114179
*  g723
*  
*  3276867
*  g729
*  G723
*  
*  2228291
*  g729    
*
* * **************************************************************************/
class Codec{

function __construct($identificador){
	$this->identificador = $identificador;
}
function valores(){
	if($this->identificador=="3211331")
		{
			$this->valor = "G723"."<br>"."G729";
		}
	elseif($this->identificador=="1114179")
		{
			$this->valor = "G723";
		}
	elseif($this->identificador=="3276867")
		{
			$this->valor = "G729"."<br>"."G723";
		}
	elseif($this->identificador=="2228291")
		{
			$this->valor = "G729";
		}
}
function LeerValor(){
	$this->valores();
	return $this->valor;
}

}
?>