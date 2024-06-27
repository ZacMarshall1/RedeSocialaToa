<?php 

    function enviarImagem($pasta = "posts"){

        // ver erros com a imagem
        if (isset($_FILES["imagemPost"]) && $_FILES["imagemPost"]["error"] == 0) {
                        
            // info da imagem
            $target_dir = "../images/$pasta/";
            $target_file = $target_dir . basename($_FILES["imagemPost"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // validar tipo de arquivo
            $check = getimagesize($_FILES["imagemPost"]["tmp_name"]);

            if($check !== false) {
                echo "É uma imagem - " . $check["mime"] . ".";
            } else {
                echo "Não é uma imagem.";
                return null;
            }

            // Aceitar apenas alguns formatos
            if(in_array($imageFileType, array("jpg", "jpeg", "png", "gif"))) {

                // Ver se já existe
                if (file_exists($target_file)) {

                    echo "Imagem existe.";
                    return null;

                } else {
                    
                    // Copiar e mover arquivo para o sistema
                    if (move_uploaded_file($_FILES["imagemPost"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["imagemPost"]["name"]). " has been uploaded.";
                        return $_FILES["imagemPost"]["name"]; // retorna nome da imagem salvo
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }

                }
            } else {
                echo "Enviar apens JPG, JPEG, PNG & GIF....";
                return null;
            }
        } else {
            echo "Erro: " . $_FILES["imagemPost"]["error"];
            return null;
        }

        return null;

    }

?>