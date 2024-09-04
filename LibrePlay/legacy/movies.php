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
            })
        }
    </script>
</head>
<body>
    <button onclick="sendJson()">Enviar JSON</button>
</body>
</html>