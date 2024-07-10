<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght@20..48,400..700" />
</head>
<body>

    <?php 
        require_once "../config/sessao.php";
        require_once "../Model/Postagem.php";
        require_once "../config/banco.php";
        include_once "../header.php";
    ?>

    <main>
        <div class="social-card-container">

                <?php

                    //FAZER A VARIAVEL POSTAGEM PUXANDO AS POSTAGENS DO BANCO E MUDAR AS INFORMAÇÕES NA FUNÇÃO GERARPOSTCARD PARA EXIBIR OS DADOS CERTOS

                    $postagens = pegarPostagens();

                    $lista =pegarPostagens();

                    for($i=0; $i < count($postagens) ; $i++ ){
                        $p = $postagens[$i];
                    //CHAMAR A FUNÇÃO QUANTIDADE DE COMENTARIOS DO BANCO E ARMAZENAR EM VARIAVEL PARA CHAMAR NA POSTAGEM
                    //COPIAR O $P COD PARA PUXAR O CODIGO DA POSTAGEM PARA ABRIR A POSTAGEM CERTA ONCLICK
                        $qtd = quantidadeDeComentarios($p->cod);
                        Postagem::gerarPostCard($p->cod, $p->imagem, $p->nome, $p->texto_post, $p->post_img, $p->likes, $qtd);

                    }
                    // Gerar um card de postagem
                    //                 CODIGO DA POSTAGEM, QUE DEVE SER ALTERADO PARA VER POSTAGENS DIFERENTES
                    //                         !
                    //                        \/
                    //Postagem::gerarPostCard(5, "prof-4.jpg", "Eduardo Henrique", "Bom Dia", "img-4.jpg", 2, 5);
                ?>


                <!-- MODELO DE CARD PARA POSTAGEM -->
                <!--
                    <div class="social-card">
                FUNÇÃO QUE SE DEVE COPIAR PARA A FUNÇÃO GERARPOSTCARD
                    <a href="./verPost.php?cod=5">
                    <div class="social-card-user-info">
                        <img src="../images/profile/prof-1.jpg" style="width: 40px">
                        <h4>Laura Manuela</h4>
                    </div>

                    <div class="social-card-content">
                        <p class="social-card-text">Que dia bom para estudar!</p>
                        
                        <img src="../images/posts/img-1.jpg">
                        <hr>
                        <span class="material-symbols-outlined">favorite</span> 5
                        <span class="material-symbols-outlined">chat_bubble</span> 
                        
                    </div>
                    </a>
                </div>
                -->
                <!-- FIM DO MODELO -->

        </div>
    </main>

</body>
</html>