<?php

include("config.inc.php");
session_start();
session_unset();
session_destroy();
session_unset($_SESSION['login']);
if ($_COOKIE["usNick"]) {
//Esto lo unico que hace es borrar el cookie
    setcookie("usPass", "x", time() - 3600);
    setcookie("usNick", "x", time() - 3600);
    setcookie("usPass");
    include("index.php");
}
?>
