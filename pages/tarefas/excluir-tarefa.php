<br>
<header>
    <h3>Excluir Tarefa</h3>
</header>
<?php
    $idTarefa = $_GET['idTarefa'];

    $sql = "DELETE FROM tdtarefas WHERE idTarefa = '{$idTarefa}'";
    $rs = mysqli_query($conn, $sql);

    if ($rs) {
        echo "<div class='alert alert-success'>Tarefa excluído com sucesso!";
        echo "<hr>";
        echo "<p class='mb-0'>
            <a class='text-success-emphasis' href='?menuop=tarefas'>Voltar à lista de Tarefas.</a>
        </p>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao excluir a tarefa, tente novamente.</p>";
        echo "<hr>";
        echo "<p class='mb-0'>
            <a class='text-success-emphasis' href='?menuop=tarefas'>Voltar à lista de Tarefas.</a>
        </p>";
        echo "</div>";
    }
?>