
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

        echo '<br/>Hola '.$usuario.', cuentame como está tu mascota '.$mascota;

        echo '<br/><br/>';
        echo 'Hacer clic aquí para <a href="logout.php"> Salir </a>';
        
    } else {
        header("Location:pirata.php");
    }  

?>     
<?php
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <form method="POST" action="../controladores/controlador.php">
        <fieldset>
            <legend>Tamaño del vaso de jugo de fruta</legend>
            <p>Seleccione un tamano</p>
            <p>
                <input type="radio" name="size" id="tam_1" value="pequeno" checked/>
                <label for="tam_1"> Pequeño </label>
            </p>
            <p>
                <input type="radio" name="size" id="tam_2" value="mediano"/>
                <label for="tam_2"> Mediano </label>
            </p>
            <p>
                <input type="radio" name="size" id="tam_3" value="grande"/>
                <label for="tam_3"> Grande </label>
            </p>
            <input type="hidden" name="formulario" value="formulario1"/>
            <input type="submit" value="Siguiente"/>

        </fieldset>
    </form>

</body>
</html>