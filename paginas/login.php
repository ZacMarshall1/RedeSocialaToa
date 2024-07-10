<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página do Perfil</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght@20..48,400..700" />
    <link rel="stylesheet" href="style.css">
</head>
<body>



<?php
    
//INICIAR A SESSÃO PARA QUE APENAS POSSA CRIAR USUARIO CASO NÃO ESTEJA LOGADO
    session_start();    
    require_once "../config/banco.php";


    $usuario = $_POST['usuario'] ?? null;
    $senha = $_POST['senha'] ?? null;


    if (!is_null($usuario) && !is_null($senha)) {
        if(fazerLogin($usuario, $senha)){
            header("Location: feed.php");
        }else{
            echo"erro";
        }
    }

    //ECHO PARA ENCONTRAR HASH DA SENHA DO USUARIO
    //echo password_hash("123", PASSWORD_DEFAULT);
?>

    <nav class="navbar">
        <a href="./feed.php"><button class="nav-button btn-secondary">Feed</button></a>
        <a href="./novoUsuario.php"><button class="nav-button btn-dark">New User</button></a>
    </nav>
    
    <main>
        <div style="width: 100%;">

            <div class="single-post-container" style="margin-top: 20px;">
                <h2>Fazer Login</h2>

                <form action="" method="post" enctype="multipart/form-data">
                    <label for="">Usuario:</label>
                    <input type="text" name="usuario" class="input-button">
                    
                    <br><br><label for="">Senha:</label>
                    <input type="text" name="senha" class="input-button">

                    <br><br><button type="submit" class="btn-blue">Comentar</button>
                </form>
            </div>

        </div>
    </main>

</body>
</html>