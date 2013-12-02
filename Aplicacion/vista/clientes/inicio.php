<?PHP
session_start();
include("config.inc.php");
require_once("log.php");
if ($loginCorrecto) { 
$BaseDeDatos = new BaseDeDatos(BD);
$BaseDeDatos->Conectar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
a:link {
	color: #033;
	text-decoration: none;
}
a:visited {
	color: #033;
	text-decoration: none;
}
a:hover {
	color: #033;
	text-decoration: none;
}
a:active {
	color: #033;
	text-decoration: none;
}
</style>
</head>

<body>
<table width="100%" height="650px" border="0" align="center" cellpadding="8" cellspacing="2">
  <tr>
    <td width="18%" height="23" align="center" bgcolor="#71ADDF"><strong>Menu General</strong></td>
    <td width="82%" rowspan="2" align="center" bgcolor="#999999"><img src="../../../imagenes/cp.png" width="256" height="256" /></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC" valign="top" >&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?PHP }  ?>