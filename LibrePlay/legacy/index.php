<?php
session_start(); // Inicia a sessão
if(!isset($_SESSION["email"])){
    header("Location: ./login_api.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibrePlay</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <ul class="nav-list">
            <li>Assista agora</li>
            <li>Filmes</li>
            <li>Séries</li>
            <li>Esporte</li>
            <li>Kids</li>
            <li>Biblioteca</li>
            <li>O</li>
        </ul>
    </header>

    <div>
        <?php
            for ($i = 0; $i < 10; $i++){
        ?>
            <div class="section">
                <h1 class="title" id="filmes">Top filmes</h1>
                <br>
                <div class="banner-list">
                <?php
                    for ($j = 0; $j < 10; $j++){
                ?>
                        <div class="banner"><a href="./movie.php"><button class="movie-link"></button></a></div>
                <?php
                    }
                ?>
                </div>
            </div>
        <?php
            }
        ?>
    </main>
    
    <footer></footer>
</body>
</html>