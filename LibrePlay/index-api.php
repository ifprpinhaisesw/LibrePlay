<?php
#session_start(); // Inicia a sessão
#if(!isset($_SESSION["email"])){
#    header("Location: ./login_api.php");
#    exit();
#}
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
        <div class="section">
            <h1 class="title" >Top filmes</h1>
            <br>
            <div class="banner-list" id="filmes">
                    <div class="banner"><a href="./movie.php"><button class="movie-link"></button></a></div>
            </div>
        </div>
    </main>
    <script>
        function create_movies(movies){
            var filmesDiv = document.getElementById('filmes');
                movies.forEach(element => {
            
                // Cria o div com a classe "banner"
                var bannerDiv = document.createElement('div');
                bannerDiv.className = 'banner';
                bannerDiv.style.backgroundImage = "url("+element.url_capa+")";
                bannerDiv.style.backgroundSize = "100% auto";
            
                // Cria o link <a>
                var link = document.createElement('a');
                link.href = './movie.php?v='+element.url_filme;
            
                // Cria o botão com a classe "movie-link"
                var button = document.createElement('button');
                button.className = 'movie-link';
            
                // Adiciona o botão dentro do link
                link.appendChild(button);
            
                // Adiciona o link dentro do div "banner"
                bannerDiv.appendChild(link);
            
                // Adiciona o banner dentro da div "filmes"
                filmesDiv.appendChild(bannerDiv);
            });
        }
        // O JSON que você deseja enviar
        //var json = { "filme": { "titulo": "Inception", "ano": 2010 } };
        var json = {}
        var data = {
            "filme": {}
        };
        console.log("Enviando:",JSON.stringify(data))
        fetch('http://localhost:3030/buscar/filme', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            console.log(data);
            json = data
            //json = data
            // Codificar o JSON como uma string
            const jsonString = JSON.stringify(json);
            
            // Codificar a string JSON para uso em URL
            const encodedJson = encodeURIComponent(jsonString);
            
            // Construir a URL com o JSON codificado
            //window.location.href = "http://localhost/movies2.php?data="+encodedJson;
            create_movies(data.message)
        })


    </script>
    <footer></footer>
</body>
</html>