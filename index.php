
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
            <h1> Sistema de gerenciamentos <br>StarGates </h1>
            <img src="teste.svg" class="left-login-img" alt="Animação">
        </div>
        <div class ="right-login">
            <div class ="card-login">
            <h1> Login</h1>
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