<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Hash da senha para maior segurança
    $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

    // Verifica se o e-mail já está cadastrado
    $checkQuery = $conn->prepare('SELECT id FROM usuarios WHERE email = ?');
    $checkQuery->bind_param('s', $email);
    $checkQuery->execute();
    $checkQuery->store_result();

    if ($checkQuery->num_rows > 0) {
        echo 'E-mail já registrado.';
    } else {
        // Insere o novo usuário no banco
        $insertQuery = $conn->prepare('INSERT INTO usuarios (email, senha) VALUES (?, ?)');
        $insertQuery->bind_param('ss', $email, $senhaHash);

        if ($insertQuery->execute()) {
            echo 'Usuário registrado com sucesso!';
        } else {
            echo 'Erro ao registrar o usuário.';
        }
    }
}
?>
