<br>
<header>
    <h3>
        <i class="bi bi-list-task"></i> Atualizar Tarefa
    </h3>
</header>
<?php

    $idTarefa = strip_tags(mysqli_real_escape_string($conn, $_POST['idTarefa']));
    $tituloTarefa = strip_tags(mysqli_real_escape_string($conn, $_POST['tituloTarefa']));
    $descricaoTarefa = strip_tags(mysqli_real_escape_string($conn, $_POST['descricaoTarefa']));
    $dataConclusaoTarefa = strip_tags(mysqli_real_escape_string($conn, $_POST['dataConclusaoTarefa']));
    $horaConclusaoTarefa = strip_tags(mysqli_real_escape_string($conn, $_POST['horaConclusaoTarefa']));
    $dataLembreteTarefa = strip_tags(mysqli_real_escape_string($conn, $_POST['dataLembreteTarefa']));
    $horaLembreteTarefa = strip_tags(mysqli_real_escape_string($conn, $_POST['horaLembreteTarefa']));
    $recorrenciaTarefa = strip_tags(mysqli_real_escape_string($conn, $_POST['recorrenciaTarefa']));

    $sql = "UPDATE tdtarefas SET
        tituloTarefa = '{$tituloTarefa}', 
        descricaoTarefa = '{$descricaoTarefa}', 
        dataConclusaoTarefa = '{$dataConclusaoTarefa}', 
        horaConclusaoTarefa = '{$horaConclusaoTarefa}', 
        dataLembreteTarefa = '{$dataLembreteTarefa}', 
        horaLembreteTarefa = '{$horaLembreteTarefa}',
        recorrenciaTarefa = '{$recorrenciaTarefa}'
        WHERE idTarefa = '{$idTarefa}'
    ";

    $rs = mysqli_query($conn, $sql) or die("Erro ao executar a consulta" . mysqli_error());

    if ($rs) {
        echo "<div class='alert alert-success'>Tarefa atualizada com sucesso!";
        echo "<hr>";
        echo "<p class='mb-0'>
            <a class='text-success-emphasis' href='?menuop=tarefas'>Voltar à lista de Tarefas.</a>
        </p>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao atualizar a tarefa, tente novamente.</p>";
        echo "<hr>";
        echo "<p class='mb-0'>
            <a class='text-success-emphasis' href='?menuop=tarefas'>Voltar à lista de Tarefas.</a>
        </p>";
        echo "</div>";
    }
?>