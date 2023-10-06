<?php
// Inicia a sessão ou retoma uma sessão existente.
session_start();

// Define um array associativo de usuários válidos com suas senhas correspondentes.
$valid_users = array(
    'administrador' => '123456789',
    'usuario' => '123456789'
);

// Verifica se o método de solicitação é POST (ou seja, se o formulário foi enviado).
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém o nome de usuário e senha do formulário.
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica se o nome de usuário existe no array $valid_users e se a senha corresponde.
    if (array_key_exists($username, $valid_users) && $valid_users[$username] == $password) {
        // Se as credenciais forem válidas, define a variável de sessão 'username'.
        $_SESSION['username'] = $username;
        // Redireciona o usuário para a página 'chamados.php'.
        header("Location: chamados.php");
        // Encerra o script.
        exit;
    } else {
        // Se as credenciais forem inválidas, define uma mensagem de erro.
        $error_message = "Credenciais inválidas. Tente novamente.";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">

    <title>Login</title>
</head>
<body>
    <div class="main-login">
        <div class ="left-login">
            <h1> Sistema de Help Desk <br>StarGates </h1>
            <img src="teste.svg" class="left-login-img" alt="Animação">
        </div>
        <div class ="right-login">
            <div class ="card-login">
            <h1> Login</h1>
            <?php if (isset($error_message)) { ?>
            <!-- Exibe uma mensagem de erro se $error_message estiver definido. -->
            <p class="error"><?php echo $error_message; ?></p>
        <?php } ?>
            <form method="post" action="login.php">
                <div class="textfield">
                    <label for="usuario">Usuário</label>
                    <input type="text" name="username" placeholder="Usuário" require>
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="password" placeholder="Senha" require>
                </div>
                <button class="btn-login" type="submit">Login</button>
            </form>
     

            </div>
        </div>
    </div>
</body>
</html> 