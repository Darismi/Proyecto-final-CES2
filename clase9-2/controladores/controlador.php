<?php

include '../modelo/batido.php';

session_start();

if(isset($_SESSION["id_session"]) 
and isset($_SESSION["nombre_usuario"])
and $_SESSION["mascota"]) {
    

    if ($_POST['formulario'] == "formulario1") {

        $batido = new batido();

        switch ($_POST['size']) {
            case 'pequeno':
                $batido->setPrecio(9000);
                break;            
            case 'mediano':
                $batido->setPrecio(12500);
                break;            
            case 'grande':
                $batido->setPrecio(16000);
                break;
        }

        $batido->setTamano($_POST['size']);
        array_push($_SESSION["carrito_de_compras"],$batido);

        setcookie('tamano', $_POST['size'], time() + 600, '/');
        header("Location:../vistas/formulario2.php");


    } else if ($_POST['formulario'] == "formulario2") {

        $batido = end($_SESSION["carrito_de_compras"]);
        $batido->setTipoUsuario($_POST["diabetes"]);

        setcookie('diabetes', $_POST['diabetes'], time() + 600, '/');
        
        if ($_POST['diabetes'] == 'diabetico') {
            header("Location:../vistas/formulario3.php");    
        } else{
            header("Location:../vistas/formulario4.php");
        }        

    } else if ($_POST['formulario'] == "formulario3" or
               $_POST['formulario'] == "formulario4") {

            $batido = end($_SESSION["carrito_de_compras"]);
            $batido->setBatido($_POST["batido"]);

        setcookie('batido', $_POST['batido'], time() + 600,'/'); 
        header("Location:../vistas/ordenfinal.php");

    } else if ($_POST['formulario'] == "terminar") {

        header('Location:../vistas/logout.php');

    } else if ($_POST['formulario'] == "otro"){
        header("Location:../vistas/inicio.php");

    } else if ($_POST['formulario'] == "cuenta"){
        header("Location:../vistas/cuenta.php");

    } else {
        header("Location:../vistas/inicio.php");
    }

    
    
}else{
    header("Location:../vistas/pirata.php");
}

?>