<?php
session_start();

$_SESSION["mensaje"] = " ";

if ($_POST['formulario'] == "index") {

    $user = trim($_POST['user_name']);
    $pass = trim($_POST['password']);

    if (empty ($user) or empty ($pass)) {

        if(isset($_SESSION["mensaje"])){
            $_SESSION['mensaje'] = "debe ingresar con usuario y contraseña";
            header('Location:../index.php');
        }
            
    } else {
        $con = mysqli_connect("localhost", 
                            "root", 
                            "", 
                            "myapp03") or die('No es posible conectar con la base de datos');
        
        $result = mysqli_query($con, "SELECT * FROM login_user WHERE user_name='".$user."' and pass='".$pass."'");                    
        $row = mysqli_fetch_array($result);

        if (is_array($row)) {

            $_SESSION["id_session"] = $row['id']."1000";
            $_SESSION["nombre_usuario"] = $row['nombre'];
            $_SESSION["mascota"] = "canario";
            $carrito = array();
            $_SESSION["carrito_de_compras"] = $carrito;

            header("Location:controlador.php");
        } else {

            if(isset($_SESSION["mensaje"])){
                $_SESSION['mensaje'] = "¡usuario o password invalidos!";
                header('Location:../index.php');
            }
        }
    }

    
}

?>