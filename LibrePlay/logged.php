<?php
session_start(); // Inicia a sessão

// Verifica se o email foi passado via GET
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Verifica se a sessão 'user_email' já foi criada
    if (!isset($_SESSION['email'])) {
        // Cria a sessão com o valor do email
        $_SESSION['email'] = $email;
        echo "Sessão criada com o email: " . $_SESSION['user_email'];
    } else {
        echo "Sessão já existente com o email: " . $_SESSION['user_email'];
    }
} else {
    echo "Nenhum email foi passado na URL.";
}
header("Location: ./index.php")
?>
<script>
    window.location.href = "./index-api.php";
</script>