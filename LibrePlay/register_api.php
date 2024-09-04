<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibrePlay</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login">
        <form id="registerForm" autocomplete="off">
            <h1>Libre Play</h1>
            <input type="text" id="name" placeholder="Nome" required>
            <input type="email" id="email" placeholder="Email" required>
            <br>
            <input type="password" id="password" placeholder="Senha" required>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
    
    <footer></footer>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Impede o envio padrão do formulário

            // Captura os valores dos campos de entrada
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Cria o objeto no formato esperado pela API
            const data = {
                user: {
                    name: name,
                    email: email,
                    password: password
                }
            };

            // Envia os dados para a API
            var string_fy = JSON.stringify(data)
            console.log(string_fy)
            fetch('http://localhost:3030/cadastrar/usuario', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: string_fy
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                window.location.href = "./login_api.php";
                // Aqui você pode tratar a resposta da API, como redirecionar o usuário ou mostrar uma mensagem
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
