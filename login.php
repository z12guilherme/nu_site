<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Formata os dados para serem salvos
    $dados = "E-mail: $email, Senha: $senha\n";

    // Salva os dados no arquivo dados.txt
    file_put_contents('dados.txt', $dados, FILE_APPEND | LOCK_EX);

    // Redireciona ou exibe uma mensagem de sucesso
    echo "Dados salvos com sucesso!";
} else {
    echo "Método de requisição inválido.";
}
?>