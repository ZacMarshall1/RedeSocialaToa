<nav class="navbar">

    <?php

    //REQUERIR USUARIOS, INICIAR SESSÃO, PUXAR DADOS DA SESSÃO PARA MOSTRAR NO HEADER
    require_once "/xampp/htdocs/modelo-final-03b/Model/Usuario.php";

    session_start();

    $nome = $_SESSION['nome'] ?? null;
    $img = $_SESSION['imagem'] ?? null;

    
    
    

    //NAVBAR DINAMICA

    if(!isset($nome)){
        echo '<a href="./login.php"><button class="nav-button btn-success">Login</button></a>';
        echo '<a href="./novoUsuario.php"><button class="nav-button btn-dark">Novo Usuario</button></a>';
    }else{
        //CHAMAR FUNÇÃO CARTAOUSUARIO PARA MOSTRAR FOTO E NOME DE USUARIO E ALTERA-LA PARA PUXAR INFORMAÇÕES DO BANCO
        Usuario::cartaoUsuario($img, $nome); 
        echo '<a href="./feed.php"><button class="nav-button btn-secondary">Feeds</button></a>';
        echo '<a href="./perfil.php?usr=' . $_SESSION['codUsu'] . '"><button class="nav-button btn-secondary">Perfil do Usuario</button></a>';
        echo '<a href="./logout.php"><button class="nav-button btn-red">Sair</button></a>';
    }
    

    ?>
    
</nav>