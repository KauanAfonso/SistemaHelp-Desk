<?php
// Inicia a sessão para permitir o acesso às variáveis de sessão.
session_start();

// Destroi a sessão atual, encerrando o acesso do usuário.
session_destroy();

// Redireciona o usuário de volta para a página de login (index.php).
header("Location: index.php");

// Encerra a execução do script para garantir que nada mais seja executado após o redirecionamento.
exit;
?>
