<?php 

    require_once "Usuario.php";

    class Postagem{
        
        
        static function gerarPostCard($codPost, $userPic, $userName, $postText, $postImg, $postLike, $postComent){
            echo '<div class="social-card">';
            echo '</div>';
        }

        static function mostrarPostUnico($codPost, $userPic, $userName, $codUser,$postText, $postImg, $postLike, $postComent){
            ?> <!-- outra forma de colocar html no php --> 
                
            <a href="../paginas/perfil.php?usr=<?=$codUser?>">
                <?php Usuario::cartaoUsuario($userPic, $userName); ?>
            </a>
            
            
            <div class="social-card-content post">
                <p class="social-card-text"> <?=$postText?> </p>
                <img src="../images/posts/<?=$postImg?>">
                <hr>
                <span class="material-symbols-outlined">favorite</span> <?=$postLike?> 
                <span class="material-symbols-outlined">chat_bubble</span> <?=$postComent?>
                
                <?php 

                    if(isset($_SESSION["nome"])){
                        echo '<a href="../paginas/apagar.php?tipo=p&cod=<?= $codPost ?>"><span class="material-symbols-outlined" style="color: red;"> delete </span></a>';
                    }
                
                ?>

            </div>
            
            <?php
        }

        static function carregarComentarios($listaComentarios){

            echo '<h4>Comentários</h4>';
            echo '<br>';
            
            for ($i=0; $i < count($listaComentarios); $i++) { 
                echo "<p>";
                echo '<a href="../paginas/apagar.php?tipo=c&cod=' . $listaComentarios[$i]->cod_comentario . '"><span class="material-symbols-outlined" style="color: red;"> delete </span></a>';
                echo $listaComentarios[$i]->comentario;
                echo '</p> <hr>';
            }
            
        }

        

    }
    


    /* MODELO - CARD
    
        <div class="social-card">
            <div class="social-card-user-info">
                <img src="../images/prof-1.jpg" style="width: 40px">
                <h4>John Doe</h4>
            </div>
            
            <div class="social-card-content">
                <p class="social-card-text">Que dia bom para estudar!</p>
                
                <img src="../images/img-2.jpg">
                <hr>
                <span class="material-symbols-outlined">favorite</span> 
                <span class="material-symbols-outlined">chat_bubble</span> 
                
            </div>
                

        </div>
    
    */

    /* MODELO - POST UNICO

        //-- post
        <div class="single-post-container">
            <div class="social-card-user-info">
                <img src="../images/profile/prof-1.jpg" style="width: 40px">
                <h4>John Doe</h4>
            </div>
            
            
            <div class="social-card-content post">
                <p class="social-card-text">Que dia bom para estudar!</p>
                <img src="../images/posts/img-2.jpg">
                <hr>
                <span class="material-symbols-outlined">favorite</span> 2
                <span class="material-symbols-outlined">chat_bubble</span> 10 
            </div>
        </div>

        //-- comentarios
        <div class="single-post-container" style="margin-top: 20px;">
            <h4>Comentários</h4>
            <br>
            
            <p> <span class="material-symbols-outlined"> delete </span> blablalba </p> <hr>
            <p>blablalba</p> <hr>
            <p>blablalba</p> <hr>

        </div>
    
    */
?>

