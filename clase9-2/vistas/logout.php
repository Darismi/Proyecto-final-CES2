<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
</head>
<body>
    <?php        

        unset($_SESSION["id_session"]);
        unset($_SESSION["nombre_usuario"]);
        unset($_SESSION["mascota"]);

        $_SESSION = array();
        session_destroy();

        setcookie('tamano', '', time() - 3600, '/');
        setcookie('diabetes', '', time() - 3600, '/');
        setcookie('batido', '', time() - 3600, '/');

        header("Location:../index.php");
    ?>    
</body>
</html>


