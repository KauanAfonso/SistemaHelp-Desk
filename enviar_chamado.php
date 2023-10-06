<?php
session_start(); // Inicia a sessão para permitir o uso de variáveis de sessão.

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Verifica se a solicitação é uma postagem de formulário.
    $mensagem = $_POST['mensagem']; // Obtém a mensagem enviada através do formulário.
    $username = $_SESSION['username']; // Obtém o nome de usuário da sessão.

    // Abre o arquivo 'chamados.txt' para escrita (modo 'a' para adicionar ao arquivo).
    $file = fopen("chamados.txt", "a");

    /*if ($file) { // Verifica se o arquivo foi aberto com sucesso.
        $chamado = "$username: $mensagem\n"; // Cria uma mensagem formatada com o nome de usuário e a mensagem.

        // Escreve a mensagem no arquivo 'chamados.txt'.
        fwrite($file, $chamado);

        // Fecha o arquivo.
        fclose($file);
    } else {
        echo "Erro ao abrir o arquivo de chamados."; // Exibe uma mensagem de erro se não for possível abrir o arquivo.
    }*/

    // Verifica se o usuário não é um administrador (não-ADM).
    if ($username !== 'administrador') {
        // Abre o arquivo 'chamados.txt' novamente para adicionar a mensagem.
        $file = fopen("chamados.txt", "a");
        
        if ($file) { // Verifica se o arquivo foi aberto com sucesso.
            $chamado = "$username: $mensagem\n"; // Cria uma mensagem formatada com o nome de usuário e a mensagem.

            // Escreve a mensagem no arquivo 'chamados.txt'.
            fwrite($file, $chamado);

            // Fecha o arquivo.
            fclose($file);
        }
    }
}

// Redireciona o usuário para a página 'chamados.php' após o envio do chamado.
header("Location: chamados.php");
exit; // Encerra a execução do script.
?>
