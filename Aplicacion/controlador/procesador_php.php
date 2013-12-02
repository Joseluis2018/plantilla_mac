<?PHP
session_start();
include("config.inc.php");

$BaseDeDatos = new BaseDeDatos(BD);
$BaseDeDatos->Conectar();


?>