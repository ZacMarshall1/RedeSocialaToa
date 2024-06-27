<?php 

    $cod = $_GET["cod"] ?? null;

    if(!is_null($cod)){

        require_once "../config/banco.php";

        adicionarLike($cod);
        // echo $cod;
        
        $previousPage = $_SERVER['HTTP_REFERER'];
        header("Location: $previousPage");

    } else {
        header("Location: feed.php");
    }


?>