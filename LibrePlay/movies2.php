<?php
session_start();
// Verificar se o parâmetro 'data' está presente na URL
if (isset($_GET['data'])) {
    // Obter o JSON codificado da URL
    $encodedJson = $_GET['data'];
    
    // Decodificar o JSON
    $jsonString = urldecode($encodedJson);
    $data = json_decode($jsonString, true);
    
    // Verificar se a decodificação foi bem-sucedida
    if (json_last_error() === JSON_ERROR_NONE) {
        echo 'JSON recebido: ';
        print_r($data);
        $_SESSION["filmes"] = $data["message"];
        echo("\nMeus filmes");
        echo($_SESSION["filmes"]);


    } else {
        echo 'Erro ao decodificar JSON: ' . json_last_error_msg();
    }
} else {
    echo 'Nenhum dado JSON enviado.';
}
?>