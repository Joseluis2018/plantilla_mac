<?php

class TablaAdministrable {
	
	private $Ancho = "500";
	private $Borde = "1";
	private $ColorDefondo;
	private $RellenoCelda = "2";
	private $EspacioCelda = "0";
	private $ColorDeBorde = "#000000";
	
	function __construct() {
	
	}
	function AsignarAncho($Ancho){
		$this->Ancho 			= $Ancho;
	}
	function AsignarBorde($Borde){
		$this->Borde			= $Borde;
	}
	function AsignarColorDeFondo($ColorDefondo){
		$this->ColorDeFondo	= $ColorDefondo;
	}
	function AsignarRellenoDeCelda($RellenoCelda){
		$this->RellenoCelda	= $RellenoCelda;
	}
	function AsignarEspacioDeCelda($EspacioCelda){
		$this->EspacioCelda	= $EspacioCelda;
	}
	function AsignarColorDeBorde($ColorDeBorde){
		$this->ColorDeBorde	= $ColorDeBorde;
	}
	function InsertarFila($NumeroDeColumnas,$ContenidoColumnas,$Alineacion){
		if($NumeroDeColumnas==count($ContenidoColumnas)){
			$this->contenido .= "<tr>";
			for($i=0;$i<$NumeroDeColumnas;$i++){
				if($Alineacion!=""){
					$this->contenido .= "<td align=".$Alineacion." >".$ContenidoColumnas[$i]."</td>";
				}else{
					$this->contenido .= "<td >&nbsp;".$ContenidoColumnas[$i]."</td>";
				}
			}
			$this->contenido .= "</tr>";
		}
		
	}
	function GenerarTabla(){
		$tabla .= '<table 
		width="'.$this->Ancho.'" 
		border="'.$this->Borde.'" 
		bordercolor="'.$this->ColorDeBorde.'"  
		cellpadding="'.$this->RellenoCelda.'" 
		cellspacing="'.$this->EspacioCelda.'" 
		bgcolor="'.$this->ColorDeFondo.'">';
		$tabla .= $this->contenido;
		$tabla .= '<table>';
		
		return $tabla;
	}
}

?>