<?php

include("config.inc.php");
session_start();
//if ($_SESSION['tipo'] == 2) {
//    include("ingreso.php");
//} else {
//    include("index.php");
//}

session_unset();
session_destroy();
session_unset($_SESSION['loginU']);
if ($_COOKIE["usNickuf"]) {
//Esto lo unico que hace es borrar el cookie
    setcookie("usPassuf", "x", time() - 3600);
    setcookie("usNickuf", "x", time() - 3600);
    setcookie("usPassuf");
    if ($_SESSION['tipo'] == 2) {
        include("index.php");
    } else {
        include("index.php");
    }
}
?>
