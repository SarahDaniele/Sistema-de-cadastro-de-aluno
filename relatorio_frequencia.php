<?php
include 'config.php';

$sql = "SELECT a.nome, f.data_presenca, f.presenca 
        FROM frequencia f 
        JOIN alunos a ON f.aluno_id = a.id
        ORDER BY f.data_presenca DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Frequência</title>
</head>
<body>
    <h1>Relatório de Frequência</h1>

    <table border="1">
        <tr>
            <th>Nome do Aluno</th>
            <th>Data</th>
            <th>Presença</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['nome'] . "</td>
                        <td>" . $row['data_presenca'] . "</td>
                        <td>" . $row['presenca'] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhuma frequência registrada</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
