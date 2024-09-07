<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aluno_id = $_POST['aluno_id'];
    $data_presenca = $_POST['data_presenca'];
    $presenca = $_POST['presenca'];

    $sql = "INSERT INTO frequencia (aluno_id, data_presenca, presenca) VALUES ('$aluno_id', '$data_presenca', '$presenca')";

    if ($conn->query($sql) === TRUE) {
        echo "Frequência registrada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT id, nome FROM alunos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle de Frequência</title>
</head>
<body>
    <h1>Controle de Frequência</h1>
    <form method="POST" action="frequencia.php">
        Aluno: 
        <select name="aluno_id">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                }
            } else {
                echo "<option>Sem alunos cadastrados</option>";
            }
            ?>
        </select><br>
        Data: <input type="date" name="data_presenca" required><br>
        Presença:
        <select name="presenca">
            <option value="Presente">Presente</option>
            <option value="Ausente">Ausente</option>
        </select><br>
        <input type="submit" value="Registrar Frequência">
    </form>
</body>
</html>
<?php
$conn->close();
?>
