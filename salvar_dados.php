<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário e faz a sanitização
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha']; // A senha será hashada antes de ser salva

    // Verifica se o e-mail é válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail inválido.";
        exit;
    }

    // Hash da senha para armazenamento seguro
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Define o nome do arquivo onde os dados serão salvos
    $arquivo = 'dados_login.txt';

    // Formata os dados para serem salvos
    $dados = "E-mail: $email, Senha: $senhaHash\n";

    // Salva os dados no arquivo
    if (file_put_contents($arquivo, $dados, FILE_APPEND | LOCK_EX) !== false) {
        // Exibe uma mensagem de sucesso
        echo "Dados salvos com sucesso!";
    } else {
        echo "Erro ao salvar os dados.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>