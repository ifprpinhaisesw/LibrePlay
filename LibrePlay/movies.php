<!DOCTYPE html>
<html>
<head>
    <title>Enviar JSON via GET</title>
    <script>
        function sendJson() {
            // O JSON que você deseja enviar
            //var json = { "filme": { "titulo": "Inception", "ano": 2010 } };
            var json = {}
            var data = {
                "filme": {} 
            };
            fetch('http://localhost:3030/buscar/filme', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => json)
            .then(data => {
                console.log('Success:', data);
                json = data
            })
            //json = data
            // Codificar o JSON como uma string
            const jsonString = JSON.stringify(json);
            
            // Codificar a string JSON para uso em URL
            const encodedJson = encodeURIComponent(jsonString);
            
            // Construir a URL com o JSON codificado
            const url = `http://localhost/movies2.php?data=${encodedJson}`;
            
            // Fazer a requisição GET
            fetch(url)
                .then(response => response.text())
                .then(data => {
                    console.log('Resposta do servidor:', data);
                })
                .catch(error => {
                    console.error('Erro:', error);
                });
        }
    </script>
</head>
<body>
    <button onclick="sendJson()">Enviar JSON</button>
</body>
</html>