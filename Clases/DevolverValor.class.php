<?PHP
session_start(); 
$_SESSION['digiPuntos']=1;   
    function devolverValor($descripcion, $precio, $idProductos, $imagen, $stock) {
        ?>
<style type="text/css">
body {
	background-color: #000;
}
</style>


        <table width='200' border=0 cellspacing='1' cellpadding='2' >
            <tr height='30' bgcolor='#2F4579' class='texto3' align='center'><td colspan="2"><b><?php echo $descripcion . ': ' . $precio . "pts"; ?></b></td></tr>
            <tr height='20' bgcolor='#FFFFFF' class='texto4'>
        <!--                <td><img alt="" class="imagenes"  src='../sistema/administracion/imagenesPuntos/<?php //echo$imagen; ?>'  width='200' height='170' /></td>-->
                <td colspan="2"><img alt="" src='../sistema/administracion/imagenesPuntos/<?php echo$imagen; ?>'  width='200' height='170' /></td>
            </tr>
            <tr height='20'  class='texto4'>
                <td width="45" align='center'>
        <?php
        if ($stock <= 0) {
            $mensaje = '<label class="textoR"><b>Agotado</b></label>';
        } else {
            $mensaje = "<label class='titulo1'>Stock: $stock</label>";
        }
        ?>
                    <?php echo$mensaje; ?>
                </td>
                <td width="150" align='center'><?php if ($stock > 0 && $_SESSION['digiPuntos'] == 1) { ?>
                  <input type='button' value='Canjear' class='boton2' onClick="agregarProducto('<?php echo $idProductos; ?>','<?php echo$descripcion; ?>','<?php echo $precio; ?>')"/>
                  <?php
                    } else {
                        if ($stock > 0 && $_SESSION['digiPuntos'] == 0) {
                            ?>
                  <!--                    <a href='javascript:ventanaSecundaria("registro_clientes.php","width=400,height=620,scrollbars=yes")'><input type="button" value="Registrese"  class='boton2'></a>-->
                  <input type="button" value="Registrese"  class='boton3' onClick='javascript:ventanaSecundaria("registro_clientes.php","width=400,height=620,scrollbars=yes")'>
                <?php
                        }
                    }
                    ?></td>
            </tr>
        </table>
        <?php
    }
	
devolverValor("descripcion", "100", "4", "sin_imagen", "80");