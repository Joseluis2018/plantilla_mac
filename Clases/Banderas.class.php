<?PHP 
Class Banderas{
	public function __construct($id){
		switch ($id){
			case 1:
				$this->imagen='<img src="imagenes/banderaverde.png" width="25" height="25" border="0" />';
				break;
			case 2:
				$this->imagen='<img src="imagenes/banderaamarilla.png" width="25" height="25" border="0" />';
				break;	
			case 3:
				$this->imagen='<img src="imagenes/banderanaranja.png" width="25" height="25" border="0" />';
				break;	
			case 4:
				$this->imagen='<img src="imagenes/banderaroja.png" width="25" height="25" border="0" />';
				break;	
			case 5:
				$this->imagen='<img src="imagenes/banderanegra.png" width="25" height="25" border="0" />';
				break;				
		}		
	}
	public function MostrarBandera(){
		return $this->imagen;
	}
}

?>
