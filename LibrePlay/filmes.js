function create_movies(movies){
    var filmesDiv = document.getElementById('filmes');
    movies.forEach(element => {
    
        // Cria o div com a classe "banner"
        var bannerDiv = document.createElement('div');
        bannerDiv.className = 'banner';
        bannerDiv.style.backgroundImage = "url("+element.url_capa+")";
    
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
    window.location.href = "http://localhost/movies2.php?data="+encodedJson;
})

