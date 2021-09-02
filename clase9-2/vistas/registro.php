<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro de usuario</title>
</head>
<body>
    <center>
        <form action="../controladores/controladorRegistro.php" method="POST">
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" type="text" required><br>
            <label for="usuario">Usuario</label>
            <input id="usuario" name="usuario" type="text" required><br>
            <label for="pass">Password</label>
            <input id="pass" name="pass" type="password" required><br>  
            <input type="submit" value="Registrar">            
        </form>
        <br>
        <a href="../index.php">Login</a>
    </center>
        
</body>
</html>
<?php

?>