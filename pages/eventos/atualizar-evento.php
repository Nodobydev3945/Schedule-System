<br>
<header>
    <h3>
        <i class="bi bi-calendar-check"></i> Atualizar Evento
    </h3>
</header>
<?php

    $idEvento = strip_tags(mysqli_real_escape_string($conn, $_POST['idEvento']));
    $tituloEvento = strip_tags(mysqli_real_escape_string($conn, $_POST['tituloEvento']));
    $descricaoEvento = strip_tags(mysqli_real_escape_string($conn, $_POST['descricaoEvento']));
    $dataInicioEvento = strip_tags(mysqli_real_escape_string($conn, $_POST['dataInicioEvento']));
    $horaInicioEvento = strip_tags(mysqli_real_escape_string($conn, $_POST['horaInicioEvento']));
    $dataFimEvento = strip_tags(mysqli_real_escape_string($conn, $_POST['dataFimEvento']));
    $horaFimEvento = strip_tags(mysqli_real_escape_string($conn, $_POST['horaFimEvento']));

    $sql = "UPDATE tdeventos SET
        tituloEvento = '{$tituloEvento}', 
        descricaoEvento = '{$descricaoEvento}', 
        dataInicioEvento = '{$dataInicioEvento}', 
        horaInicioEvento = '{$horaInicioEvento}', 
        dataFimEvento = '{$dataFimEvento}', 
        horaFimEvento = '{$horaFimEvento}'
        WHERE idEvento = '{$idEvento}'
    ";

    $rs = mysqli_query($conn, $sql) or die("Erro ao executar a consulta" . mysqli_error());

    if ($rs) {
        echo "<div class='alert alert-success'>Evento atualizado com sucesso!";
        echo "<hr>";
        echo "<p class='mb-0'>
            <a class='text-success-emphasis' href='?menuop=eventos'>Voltar à lista de eventos.</a>
        </p>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao atualizar o Evento, tente novamente.</p>";
        echo "<hr>";
        echo "<p class='mb-0'>
            <a class='text-success-emphasis' href='?menuop=eventos'>Voltar à lista de eventos.</a>
        </p>";
        echo "</div>";
    }
?>