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
        require_once "../Model/Postagem.php";
        include_once "../header.php";
    ?>

    <main>
        <div class="social-card-container">

                <?php 
                    // Gerar um card de postagem
                    Postagem::gerarPostCard(0, "prof-4.jpg", "Eduardo Henrique", "Bom Dia", "img-4.jpg", 2, 5);
                ?>

                
                <!-- MODELO DE CARD PARA POSTAGEM -->
                <div class="social-card">
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
                <!-- FIM DO MODELO -->

        </div>
    </main>

</body>
</html>