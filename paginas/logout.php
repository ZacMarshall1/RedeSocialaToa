<?php 

    session_start();

    unset($_SESSION['usu']);
    unset($_SESSION['nome']);
    unset($_SESSION['imagem']);

    header("Location: ./login.php");

?>
