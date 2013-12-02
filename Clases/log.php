<?php 
$loginCorrecto = false; 
$BaseDeDatos = new BaseDeDatos(BD);
$BaseDeDatos->Conectar();
if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"])) 
{ 
	$Where[0]	= "login";
	$Where[1]	= "password";
	$Valor[0]		= $_COOKIE["usNick"];
	$Valor[1]		= $_COOKIE["usPass"];
	
	$BaseDeDatos->Consultar("emcuenta","*",$Where,$Valor,"");
	
	if($row = mysql_fetch_array($BaseDeDatos->Query())) 
	{ 
		setcookie("usNick",$_COOKIE["usNick"],time()+7776000); 
		setcookie("usPass",$_COOKIE["usPass"],time()+7776000); 

		
		$loginCorrecto = true; 
		
		$_SESSION['login'] 			= $row["login"];
		$_SESSION['idasesor'] 		= $row["EmPersonal_idAsesor"];

		$BaseDeDatos2 = new BaseDeDatos(BD);
		$BaseDeDatos2->Conectar();
			
		$Whe[0]		= "idAsesor";
		$Val[0]	= $_SESSION['idasesor'];
			
		$BaseDeDatos2->Consultar("empersonal","*",$Whe,$Val,"");
		@$uarray = mysql_fetch_array($BaseDeDatos2->Query());
			
		$_SESSION['nombre'] = $uarray["nombre"];
		$_SESSION['apellido'] = $uarray["apellido"];
		$_SESSION['idcargo'] = $uarray["Cargo_idCargo"];
		$_SESSION['foto'] = $uarray["foto"];

	} 
	else 
	{ 
		//Destruimos las cookies. 
		setcookie("usNick","x",time()-3600); 
		setcookie("usPass","x",time()-3600); 
	} 
	//mysql_free_result($result); 
} 
?>
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
      <td width="15%"><span class="texto5"><div id="bs1"><?PHP 
	  $estadobases1 = new EstadoBases(1);
	  echo $estadobases1->BasesActivas();
	  ?></div></span></td>
    </tr>
    <tr>
      <td align="center"><span class="texto5"><strong>+</strong></span></td>
      <td><span class="texto5">Bases de Movistar</span></td>
      <td><span class="texto5"><div id="bs2"><?PHP
	  
	  $estadobases2 = new EstadoBases(2);
	  echo $estadobases2->BasesActivas();
	   ?></div></span></td>
    </tr>
    <tr>
      <td align="center"><span class="texto5"><strong>+</strong></span></td>
      <td colspan="2"><span class="texto5">ahora ya ta activada :D</span></td>
    </tr>
    <tr>
      <td align="center"><span class="texto5"><strong>+</strong></span></td>
      <td colspan="2"><span class="texto5"><div id="mt">d</div></span></td>
    </tr>
    <tr>
      <td align="center"><span class="texto5"><strong>+</strong></span></td>
      <td colspan="2"></td>
    </tr>
    <tr>
      <td align="center"><span class="texto5"><strong>+</strong></span></td>
      <td colspan="2"><?PHP 
	  $estadobases1 = new EstadoBases(1);
	  echo $estadobases1->BasesActivas();
	  echo " ";
	  $estadobases2 = new EstadoBases(2);
	  echo $estadobases2->BasesActivas();
	  ?>&nbsp;</td>
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