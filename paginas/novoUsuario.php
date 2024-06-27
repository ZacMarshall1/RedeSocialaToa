<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuario</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght@20..48,400..700" />
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php 
        require_once "../config/enviarImagem.php";

        session_start();

        $usuario = $_SESSION['usu'] ?? null;

        // Usuario Já Logado?
        if(!is_null($usuario)){
            header("Location: ./feed.php");
        }else{

            // ver se o formulário foi enviado
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $imagemNovoUsuario = enviarImagem("profile"); // função para pegar e salvar a imagem
                //-- novoUsuario($usuario, $nome, $senha, $imagemNovoUsuario); //-- descomentar quando tiver os valores
                
            }
            
        }

    ?>
    
    <nav class="navbar">
        <a href="./feed.php"><button class="nav-button btn-secondary">Feed</button></a>
        <a href="./login.php"><button class="nav-button btn-success">Login</button></a>
    </nav>
    
    <main>
        <div style="width: 100%;">

            <div class="single-post-container" style="margin-top: 20px;">
                <h2>Criar Usuario</h2>

                <form action="" method="post" enctype="multipart/form-data">
                    <label for="">Usuario:</label>
                    <input type="text" name="usuario" class="input-button">

                    <br><label for="">Nome:</label>
                    <input type="text" name="nome" class="input-button">
                    
                    <br><label for="">Senha:</label>
                    <input type="text" name="senha" class="input-button">

                    <br><label for="">Imagem:</label>
                    <input type="file" name="imagemPost">

                    <br><br><button type="submit" class="btn-blue">Criar</button>
                </form>
            </div>

        </div>
    </main>

</body>
</html>