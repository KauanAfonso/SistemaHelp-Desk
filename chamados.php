<?php
session_start(); // Inicia a sessão para permitir o uso de variáveis de sessão.

if (!isset($_SESSION['username'])) {
    // Se o usuário não estiver autenticado (não tiver uma variável de sessão 'username' definida),
    // redireciona-o de volta para a página de login (index.php).
    header("Location: index.php");
    exit; // Encerra o script para garantir que nada mais seja executado após o redirecionamento.
}

$username = $_SESSION['username']; // Obtém o nome de usuário da variável de sessão.
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Help Desk</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js" defer></script>
</head>
<body>
    <div class="chamados-container">
        <h2>Bem-vindo, <?php echo $username; ?>!</h2>
        
        <?php if ($username == 'administrador') { ?>
            <!-- Se o usuário for um administrador, exibe a lista de chamados abertos. -->
            <h3>Chamados Abertos</h3>
            
            <div id="conteudo">
            <div class="chamados-list" >
                <?php
                $chamados = file("chamados.txt");

                if ($chamados) {
                    foreach ($chamados as $chamado) {
                        echo "<p>$chamado</p>";
                    }
                } else {
                    echo "<p>Nenhum chamado aberto.</p>";
                }
                ?>
            </div></div>
            <button class="btn-apagar"><a href="apagar_chamado.php">Apagar Chamado</a></button><br><br>
            <button id="pdf">Gerar pdf</button><!-- Link para a página de exclusão -->
        <?php } else { ?> 
            <!-- Se o usuário não for um administrador, exibe o formulário para enviar um novo chamado. -->
            <h3>Enviar Chamado</h3>
            <form action="enviar_chamado.php" method="post">
                <textarea name="mensagem" placeholder="Digite seu chamado" required></textarea><br>
                <button class="enviar" type="submit">Enviar</button>
            </form>
        <?php } ?>

       

       
        <!-- Adiciona um link para fazer logout. -->
        <a href="logout.php">Sair</a>
    </div>


</body>
</html>

