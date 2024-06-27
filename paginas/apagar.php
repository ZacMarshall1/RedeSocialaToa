<?php 

    $post_ou_comentario = $_GET["tipo"] ?? null;
    $cod = $_GET["cod"] ?? null;

    if(!is_null($post_ou_comentario) || !is_null($cod)){

        require_once "../config/banco.php";

        if($post_ou_comentario == "p"){
            apagarPost($cod);
            header("Location: feed.php");
        }else if($post_ou_comentario == "c"){
            apagarComentario($cod);
            $previousPage = $_SERVER['HTTP_REFERER'];
            header("Location: $previousPage");
        }

    }


?>