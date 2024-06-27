<?php 

    class Usuario{


        static function cartaoUsuario($userPic, $userName){
            
            echo '<div class="social-card-user-info">';
            echo '<img src="../images/profile/' . $userPic . '" style="width: 40px">';
            echo '<h4>' . $userName . '</h4>';
            echo '</div>';
            
        }

        static function salvarUsuarioNaSessao($objUsuario){
            $_SESSION['codUsu'] = $objUsuario ->cod;
            $_SESSION['usu'] = $objUsuario ->usuario;
            $_SESSION['nome'] = $objUsuario ->nome;
            $_SESSION['imagem'] = $objUsuario ->imagem;
        }
        
    }



?>