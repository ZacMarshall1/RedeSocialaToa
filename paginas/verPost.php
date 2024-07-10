<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght@20..48,400..700" />
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php 
        require_once "../Model/Postagem.php";
        require_once "../config/banco.php";
        include_once "../header.php";

        $codPostagem = $_GET["cod"] ?? null;
        $novoComentario = $_POST["comentario"] ?? null;

        if(!is_null($novoComentario)){
            adicionarComentario($codPostagem, $novoComentario);
        }
        
        $post = abrirPostagem($codPostagem);
        $listaComentarios = pegarComentariosDePostagem($codPostagem);
    ?>

    <main>
        <div style="width: 100%;">
        
            <!-- Ver apenas o post escolhido -->
            <div class="single-post-container">
                <?php 
                    Postagem::mostrarPostUnico($codPostagem, $post->imagem, $post->nome, $post->cod_usuario, $post->texto_post, $post->post_img, $post->likes, count($listaComentarios));
                ?>
            </div>
            
            <div class="single-post-container" style="margin-top: 20px;">
            
                <!-- Carregar todos os comentários dos posts -->
                
                <?php 
                    //PUXAR FUNÇÃO CARREGARCOMENTARIOS DA POSTAGEM.PHP
                    Postagem::carregarComentarios($listaComentarios);
                ?>
                <!-- Adicionar novo comentário -->
                <form action="" method="post">
                    <input type="text" name="comentario">
                    <button type="submit" class="btn-blue">Comentar</button>
                </form>

            </div>

        </div> 
    </main>

</body>
</html>