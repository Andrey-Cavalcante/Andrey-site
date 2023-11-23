<?php
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);
    $habilidade = $mysqli->real_escape_string($_POST['habilidade']);
    $recursos = $mysqli->real_escape_string($_POST['recursos']);


    // Verifica se o e-mail já está cadastrado
    $check_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $mysqli->query($check_email);

    if ($result->num_rows > 0) {
        echo "Este e-mail já está cadastrado. Escolha outro e-mail.";
    } else {
        // Insere o novo usuário no banco de dados

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $inserir_usuario = "INSERT INTO usuarios (nome, email, senha, habilidade, recursos) VALUES ('$nome','$email', '$senha','$habilidade','$recursos')";
        
        if ($mysqli->query($inserir_usuario)) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $mysqli->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
   <link rel="stylesheet" href="style.css">
    <h2>Cadastro</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <label for="nome">Nome:</label>
        <input type="nome" name="nome" required><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <label for="habilidade">Habilidade:</label>
        <input type="habilidade" name="habilidade" required><br>

        <label for="recursos">Recursos:</label>
        <input type="recursos" name="recursos" required><br>

        <input type="submit" value="Cadastrar">
        <p>
      <button> <a href="logout.php">Sair</a> </button>
    </p>

    </form>
</body>
</html>
