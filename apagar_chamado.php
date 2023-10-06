<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['username'];

if ($username != 'administrador') {
    header("Location: chamados.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['apagar_chamado'])) {
    $chamadoIndex = $_POST['apagar_chamado'];
    apagarChamado($chamadoIndex);
}

function apagarChamado($chamadoIndex) {
    $chamados = file("chamados.txt");

    if (isset($chamados[$chamadoIndex])) {
        unset($chamados[$chamadoIndex]);
        $chamados = array_values($chamados);
        file_put_contents("chamados.txt", implode("", $chamados));
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Help Desk - Apagar Chamado</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="chamados-container">
        <h2>Bem-vindo, <?php echo $username; ?>!</h2>
        <h3>Apagar Chamado</h3>
        
        <div class="chamados-list">
            <?php
            $chamados = file("chamados.txt");

            if ($chamados) {
                foreach ($chamados as $index => $chamado) {
                    echo "<p>$chamado</p>";
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='apagar_chamado' value='$index'>";
                    echo "<button type='submit'>Apagar</button>";
                    echo "</form>";
                }
            } else {
                echo "<p>Nenhum chamado aberto.</p>";
            }
            ?>
        </div>
        
        <a href="chamados.php">Voltar</a>
    </div>
</body>
</html>
