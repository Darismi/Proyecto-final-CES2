<?php
include '../modelo/batido.php';
session_start();
//echo $_SESSION["nombre_usuario"];

if(isset($_SESSION["id_session"]) 
and isset($_SESSION["nombre_usuario"])
and $_SESSION["mascota"]) {                    
    echo "<h1>Bienvenido: </h1>".$_SESSION["nombre_usuario"];
    
    $session = $_SESSION["id_session"];

    $usuario = $_SESSION["nombre_usuario"];

    $mascota = $_SESSION["mascota"];            

    echo '<br/>session conectada: '.$session;

    echo '<br/>Hola '.$usuario.', estamos felices porque tú y tu mascota '.$mascota;

    echo '<br/>disfrutarán un batido en un vaso de tamaño '.$_COOKIE['tamano'];

    echo '<br/>y será un delicioso batido de '.$_COOKIE['batido'].
    ' para '.$_COOKIE['diabetes'];

    echo '<br/>Listado de batidos del pedido: ';

    foreach ($_SESSION["carrito_de_compras"] as $batido){
        echo '<br/>Tamano: '.$batido->getTamano().' Usuario: '.$batido->getTipoUsuario().' Batido: '.$batido->getBatido();
    }

    echo '<br/><br/>';
    
}else {

    header("Location:pirata.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" content="text/css" href="estilos.css" />
    <title>Document</title>
</head>
<body>

<form action="../controladores/controlador.php" method="post">
    <input type="submit" value="Pedir Otro"/>           
    <input type="hidden" name="formulario" value="otro" />    
</form>
<form action="../controladores/controlador.php" method="post">
    <input type="submit" value="Generar Cuenta"/>           
    <input type="hidden" name="formulario" value="cuenta" />    
</form>
<form action="../controladores/controlador.php" method="post">
    <input type="submit" value="Terminar"/>           
    <input type="hidden" name="formulario" value="terminar" />    
</form>
    
</body>
</html>
