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
        <legend>Información del estádo del usuario:</legend>
        <p>Seleccione una opción</p>
        <p>
            <input type="radio" name="diabetes" id="dia_1" value="diabetico" />
            <label for="dia_1">Diabético</label>
        </p>
        <p>
            <input type="radio" name="diabetes" id="dia_2" value="no_diabetico" checked/>
            <label for="dia_2">No Diabético</label>
        </p>
        <input type="hidden" name="formulario" value="formulario2" />
        <input type="submit" value="Siguiente">
    </fieldset>

</form>
    
</body>
</html>
