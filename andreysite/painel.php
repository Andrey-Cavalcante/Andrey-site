<?php
// Substitua pelas suas informações reais de conexão
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Cria uma conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


include('protect.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);


// Substitua isso pela sua consulta SQL real
$sql = "SELECT nome, email, habilidade, recursos FROM usuarios";
$result = $conn->query($sql);



?>

    <h2>Salve Salve <?php echo $_SESSION['nome']; ?>.
    </h2>

<br>
<?php
    // Verifica se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        echo "<h2>Lista de Usuários</h2>";
        echo "<ul>";

        // Loop através dos resultados
        while ($row = $result->fetch_assoc()) {
            // Use $row para acessar os valores das colunas do banco de dados
            echo "<li>Nome: " . $row['nome']  . ",Email: " . $row['email'] . ", Habilidade: " . $row['habilidade'] .  ", Recursos: " . $row['recursos'] . "</li>";
        }

        echo "</ul>";
    } else {
        echo "Nenhum usuário encontrado.";
    }

    // Fecha a conexão
    $conn->close();
    ?>


<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   
  <br>
    <p>
      <button> <a href="logout.php">Sair</a> </button>
    </p>
   
    

</body>
</html>

