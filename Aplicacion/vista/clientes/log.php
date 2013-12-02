<?php 
$loginCorrecto = false; 
$BaseDeDatos = new BaseDeDatos(BD);
$BaseDeDatos->Conectar();
if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"])) 
{ 
	$Where[0]	= "op_user";
	$Where[1]	= "op_pass";
	$Valor[0]		= $_COOKIE["usNick"];
	$Valor[1]		= $_COOKIE["usPass"];
	
	$BaseDeDatos->Consultar("usuarios","*",$Where,$Valor,"");
	
	if($row = mysql_fetch_array($BaseDeDatos->Query())) 
	{ 
		setcookie("usNick",$_COOKIE["usNick"],time()+7776000); 
		setcookie("usPass",$_COOKIE["usPass"],time()+7776000); 

		
		$loginCorrecto = true; 
		
		$_SESSION['loginU'] 			= $row["op_user"];
		$_SESSION['idU'] 			= $row["idusuarios"];
		
		$_SESSION['nombresU'] 				= $row["nombres"];
		$_SESSION['apellidosU'] 			= $row["apellidos"];
		$_SESSION['telefonoU']	 			= $row["telefono"];
		$_SESSION['t_documentoU'] 			= $row["t_documento"];
		$_SESSION['documentoU'] 			= $row["documento"];		
		
		$_SESSION['direccionU'] 			= $row["direccion"];
		$_SESSION['departamentoU'] 			= $row["departamento"];
		$_SESSION['provinciaU'] 			= $row["provincia"];
		
		$_SESSION['p_contactoU'] 			= $row["p_contacto"];
		$_SESSION['agenciaU'] 			= $row["agencia"];

	} 
	else 
	{ 
		//Destruimos las cookies. 
		setcookie("usNick","x",time()-3600); 
		setcookie("usPass","x",time()-3600); 
	} 
	//mysql_free_result($result); 
} 
/*
<style type="text/css">
div#abajok2 
{
position: fixed;
bottom: 0;
width:200;
background-color:#FFF;
margin-left: 85%; 
}
</style>
<div id="abajok2" align="center">

  <table width="100%" border="0" cellspacing="5">
    <tr>
      <td colspan="3" align="center"><span class="titulo1">Noticias e Informacion</span></td>
    </tr>
    <tr>
      <td width="19%" align="center"><span class="texto5"><strong>+</strong></span></td>
      <td width="66%"><span class="texto5">Bases de Claro</span></td>
      <td width="15%"><span class="texto5"><?PHP 
	  $estadobases1 = new EstadoBases(1);
	  echo $estadobases1->BasesActivas();
	  ?></span></td>
    </tr>
    <tr>
      <td align="center"><span class="texto5"><strong>+</strong></span></td>
      <td><span class="texto5">Bases de Movistar</span></td>
      <td><span class="texto5"><?PHP
	  
	  $estadobases2 = new EstadoBases(2);
	  echo $estadobases2->BasesActivas();
	   ?></span></td>
    </tr>
    <tr>
      <td align="center"><span class="texto5"><strong>+</strong></span></td>
      <td colspan="2"><span class="texto5">ahora ya ta activada :D</span></td>
    </tr>
    <tr>
      <td align="center"><span class="texto5"><strong>+</strong></span></td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><span class="texto5"><strong>+</strong></span></td>
      <td colspan="2"></td>
    </tr>
    <tr>
      <td align="center"><span class="texto5"><strong>+</strong></span></td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><span class="texto5"><strong>+</strong></span></td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><span class="texto5"><strong>+</strong></span></td>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>

</div>
*/
?>