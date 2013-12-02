<?php
class EstadoBases{
	function __construct($licea){
		$this->ba = 0;
		$this->bi = 0;
		$this->licea = $licea;
		$this->Estados();
	}
	function Estados(){
		$BaseDeDatos = new BaseDeDatos(BD);
		$BaseDeDatos->Conectar();
		$Where[0] = "Gateway_idGateway";
		$Valor[0] = $this->licea;
		$BaseDeDatos->Consultar("ss_bases","*",$Where,$Valor,"");
		while($cadena = mysql_fetch_array($BaseDeDatos->Query())){
			$BaseDeDatos2 = new BaseDeDatos(BD);
			$BaseDeDatos2->Conectar();
			$Where[0] = "id_route";
			$Valor[0] = $cadena[id_route];
			$BaseDeDatos2->Consultar("gateways","*",$Where,$Valor,"");
			$cadena2 = mysql_fetch_array($BaseDeDatos2->Query());
			$TypeBase[] = $cadena2[type];
		}

		for($i=0;$i<count($TypeBase);$i++){
			if ($TypeBase[$i] == 3145728){
				$this->ba = $this->ba+1;
			}
			elseif($TypeBase[$i] == 3145732){
				$this->bi = $this->bi+1;
			}
		}
	
	}
	function BasesActivas(){
		return $this->ba;
	}
	function BasesInactivas(){
		return $this->bi;
	}
	
}