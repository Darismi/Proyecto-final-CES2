<?php
    session_start();
    //echo $_SESSION["nombre_usuario"];

    if(isset($_SESSION["id_session"]) 
    and isset($_SESSION["nombre_usuario"])
    and $_SESSION["mascota"]) {                    
        echo "<h1>Bienvenido: </h1>".$_SESSION["nombre_usuario"];
        
        $session = $_SESSION["id_session"];

        $usuario = $_SESSION["nombre_usuario"];

        $mascota = $_SESSION["mascota"];            

        echo '<br/>session conectada: ',$session;

        echo '<br/>Hola '.$usuario.', estamos felices porque tú y tu mascota '.$mascota;

        echo '<br/>disfrutarán un batido en un vaso de tamaño '.$_COOKIE['tamano'];

        echo '<br/>y será un delicioso batido para '.$_COOKIE['diabetes'];

        echo '<br/><br/>';
        echo 'Hacer clic aquí para <a href="logout.php"> Salir </a>';
        
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
    <title>Document</title>
</head>
<body>

<form action="../controladores/controlador.php" method="POST">

    <fieldset>
        <legend>Batidos para diabeticos:</legend>
        <p>Seleccione una opción</p>
        <p>
            <input type="radio" name="batido" id="batido_1" value="cerezas_pina_naranja" />
            <label for="batido_1">Batido de cerezas, piña y naranja</label>
        </p>
        <p>
            <input type="radio" name="batido" id="batido_2" value="fresas_banano" />
            <label for="batido_2">Batido de fresas y banano</label>
        </p>
        <p>
            <input type="radio" name="batido" id="batido_3" value="verde_tropical" />
            <label for="batido_3">Batido verde tropical</label>
        </p>
        <input type="hidden" name="formulario" value="formulario3" />
        <input type="submit" value="Siguiente">
    </fieldset>

</form>
    
</body>
</html>
