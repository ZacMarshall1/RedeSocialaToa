<?php 
        //header("Location:/modelo-final-03b/paginas/feed.php");
        session_start();

$usu = $_SESSION["usuario"] ?? null;

    if (!is_null($usu)) {
        // Usuário já está logado
        header("Location:/modelo-final-03b/paginas/feed.php"); // Redirecionar para a página de feed
        exit();
    } else {
        header("Location:/modelo-final-03b/paginas/login.php"); // Redirecionar para a página de login
        exit();
    }
    

?>