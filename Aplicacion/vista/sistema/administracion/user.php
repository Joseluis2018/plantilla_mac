<?php 
session_start();
include("config.inc.php");
$BaseDeDatos = new BaseDeDatos(BD);
$BaseDeDatos->Conectar();

	$direct = "index.php"; // redireccionamos a la pagina para usuarios
                     
include("log.php"); //en este include cargamos las variables y las cookies 
//ademas verificamos el usuario y pws

if($loginCorrecto) //si es correcto
{ 

	include("inicio.php"); // redireccionamos a la pagina para usuarios

//////////////////////////////////////////////////////////////////////////////////////////
} 
else // de lo contrario verificamos cual es el error
{ 
	if(trim($_POST["login"]) != "" && trim($_POST["password"]) != "") 
	{ 
		$nickN = $_POST["login"]; 
		$passN = md5($_POST["password"]); 
		
		$Where[0]	= "op_admin";
		$Valor[0]	= $nickN;
		
		$BaseDeDatos->Consultar("administradores","*",$Where,$Valor,"");
			 

		if($row = mysql_fetch_array($BaseDeDatos->Query())) 
		{ 
			if($row["op_pass"] == $passN) 
			{ 
				//90 dias dura la cookie 
				setcookie("usNick",$nickN,time()+7776000); 
				setcookie("usPass",$passN,time()+7776000);
				

				echo '<SCRIPT LANGUAGE="javascript"> location.href = "user.php?<?=SID;?>"; </SCRIPT>'; 

				
				
			} 
			else 
			{ 
				$error = "Password incorrecto"; 
				include($direct); 
			} 
		} 
		else 
		{ 
			$error = "Usuario no existente en la base de datos"; 
			include($direct); 
		} 
	} 
	else 
	{ 
		$error = "Debe especificar un Usuario y password"; 
		include($direct); 
	}
}
?>