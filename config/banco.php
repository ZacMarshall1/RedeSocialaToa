<?php 

    

    // INICIAR BANCO --------------------------------------------------------------------------
    $banco = new mysqli("localhost:3307", "root", "", "banco_prova");

    if($banco->connect_errno){
        echo "<p>Erro: " . $banco->errno . "-->" . $banco->connect_error . "</p>";
        die();
    }


    // FUNÇÃO DE USUARIO --------------------------------------------------------------------------
    function novoUsuario($usuario, $nome, $senha, $image = null){
        global $banco;

        //TROCAR A SENHA NORMAL PARA ENVIAR SENHA COM HASH PARA O BANCO DE DADOS
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $q = "INSERT INTO usuarios(usuario, nome, senha, imagem) VALUES ('$usuario', '$nome', '$senhaHash', '$image')";
        $banco->query($q);
    }
    
    function pegarUsuario($codUsuario){
        global $banco;

        $q = "SELECT * FROM usuarios WHERE cod = $codUsuario";
        $busca = $banco->query($q);
        return $busca->fetch_object();
    }
    

    function fazerLogin($usuario, $senha){
        global $banco;
        require_once "../Model/Usuario.php";

        $q = "SELECT * FROM usuarios WHERE usuario='$usuario'";
        $busca = $banco->query($q);

        if($busca->num_rows > 0){

            $objUsuario = $busca->fetch_object();

//MUDAR O IF PARA O IF DA HASH
            //if($senha === $objUsuario->senha){
            if (password_verify($senha ,$objUsuario->senha)){
                echo "Login :)";

                //SALVA O USUARIO NA SESSÃO
                Usuario::salvarUsuarioNaSessao($objUsuario);
                ///////////////////////////////////////////
                return true;
            }else{
                echo "Senha Inválida :/";
                return false;
            }

        }

    }

    // FUNÇÃO DE LIKE --------------------------------------------------------------------------
    function adicionarLike($codPost){
        global $banco;
        $q = "UPDATE postagens SET likes = likes + 1 WHERE cod = $codPost";
        $banco->query($q);
    }

    
    // FUNÇÕES DE COMENTARIOS --------------------------------------------------------------------------
    function adicionarComentario($codPost, $comentario){
        global $banco;
        $q = "INSERT INTO comentarios(cod_post, comentario) VALUES ($codPost, '$comentario')";
        $banco->query($q);
    }

    function apagarComentario($codComentario){
        global $banco;
        // echo $codComentario;
        $q = "DELETE FROM comentarios WHERE cod_comentario = $codComentario";
        $banco->query($q);
    }
    
    function pegarComentariosDePostagem($fromPost){
        global $banco;

        $q = "SELECT * from comentarios WHERE cod_post = $fromPost";
        $busca = $banco->query($q);
            
        $listaComentarios = [];
        while ($objPost = $busca->fetch_object()){
            $listaComentarios[] = $objPost;
        }

        return $listaComentarios;
    }

    function quantidadeDeComentarios($fromPost){
        $lista = pegarComentariosDePostagem($fromPost);
        return count($lista);
    }



    //  FUNÇÕES DAS POSTAGENS --------------------------------------------------------------------------
    function adicionarPostagem($codUsuario, $textPost = null, $image = null){
        global $banco;
        $q = "INSERT INTO postagens(cod_usuario, texto_post, post_img, likes) VALUES ($codUsuario, '$textPost', '$image', 0)";
        $banco->query($q);
    }

    function apagarPost($codPost){
        global $banco;
        echo $codPost;
        $q = "DELETE FROM postagens WHERE cod = $codPost";
        $banco->query($q);
    }

    function pegarPostagens($codUsuario = null){

        global $banco;

        // todas
        if(is_null($codUsuario)){

            // $busca = $banco->query("SELECT * from postagens");
            $q = "SELECT p.cod, p.texto_post, p.post_img, p.likes, u.nome, u.imagem from postagens p JOIN usuarios u WHERE u.cod = p.cod_usuario";

        } else {
            // de um usuario
            $q = "SELECT p.cod, p.texto_post, p.post_img, p.likes, u.nome, u.imagem from postagens p JOIN usuarios u ON u.cod = p.cod_usuario WHERE u.cod = $codUsuario";

        }

        $busca = $banco->query($q);

        $listaPost = [];
        while ($objPost = $busca->fetch_object()){
            $listaPost[] = $objPost;
        }
        //return $busca->fetch_all();
        return $listaPost;

    }

    function abrirPostagem($codPostagem){
        global $banco;
        
        $q = "SELECT p.texto_post, p.post_img, p.likes, p.cod_usuario, u.nome, u.imagem FROM postagens p JOIN usuarios u ON p.cod_usuario = u.cod WHERE p.cod = $codPostagem";
        $busca = $banco->query($q);
        return $busca->fetch_object();
    }

        

?>