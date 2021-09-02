<?php
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];

    $con = mysqli_connect("localhost", 
                            "root", 
                            "", 
                            "myapp03") or die('No es posible conectar con la base de datos');
    
    $query = mysqli_query($con, "INSERT INTO `login_user` 
                                (`id`, `nombre`, `user_name`, `pass`)
                                VALUES
                                (NULL, '".$nombre."', '".$usuario."', '".$pass."');");
?>