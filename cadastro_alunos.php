<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $curso = $_POST['curso'];

    $sql = "INSERT INTO alunos (nome, data_nascimento, curso) VALUES ('$nome', '$data_nascimento', '$curso')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo aluno cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Alunos</title>
</head>
<body>
    <h1>Cadastro de Alunos</h1>
    <form method="POST" action="cadastro_alunos.php">
        Nome: <input type="text" name="nome" required><br>
        Data de Nascimento: <input type="date" name="data_nascimento" required><br>
        Curso: <input type="text" name="curso" required><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
