
<?php
session_start();
/*
    session_start();
    $mensaje="";
    if (count($_POST) > 0) {
        //header('Location:inicio.php');
        if (empty($_POST["user_name"]) or empty($_POST["password"])) {            
            $mensaje = "¡Ingrese todos los datos en los campos!";
        } else {
            $con = mysqli_connect("localhost", "root", "", "myapp03") or die('No es posible conectar con la base de datos');
            $result = mysqli_query($con, "SELECT * FROM login_user WHERE user_name='".$_POST['user_name']."' and pass='".$_POST['password']."'");
            $row = mysqli_fetch_array($result);
            if (is_array($row)) {

                $_SESSION["id_session"] = $row['id']."1000";
                $_SESSION["nombre_usuario"] = $row['nombre'];
                $_SESSION["mascota"] = "canario";

                header("Location:controladores/controlador.php");
            } else {
                $mensaje = "¡usuario o password invalidos!";
            }
        }
        
    }
      */  
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Myapp03 Login</title>
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
</head>
<body>
    <form action="controladores/controladorLogin.php" method="post" align="center">

        <div>
            <?php
            
                if (isset($_SESSION["mensaje"])) {
                    echo '<h2>'.$_SESSION["mensaje"].'</h2>';
                }
            
            ?>
        </div>
        
        <h3>Ingrese los datos del usuario para el login:</h3>

        Usuario: <input type="text" name="user_name">
        <br>
        Password: <input type="password" name="password">
        <br><br>
        <input type="hidden" name="formulario" value="index"/>
        <input type="submit" name="enviar" value="Enviar"/>
        <input type="reset"/>

    </form>        

    <a href="vistas/registro.php">registro</a>
</body>
</html>