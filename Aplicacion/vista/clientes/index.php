<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="user.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="394" border="0" align="center" cellpadding="7" cellspacing="2">
    <tr>
      <td colspan="2" align="center" bgcolor="#999999"><strong>Area de Clientes</strong></td>
    </tr>
    <tr>
      <td width="181" bgcolor="#CCCCCC">Usuario:</td>
      <td width="193" bgcolor="#CCCCCC"><label for="login"></label>
      <input type="text" name="login" id="login" /></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC">Password:</td>
      <td bgcolor="#CCCCCC"><label for="password"></label>
      <input type="text" name="password" id="password" /></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#CCCCCC"><?PHP  //echo $error ?></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#CCCCCC"><input type="submit" name="button" id="button" value="Ingresar" /></td>
    </tr>
  </table>
</form>
</body>
</html>