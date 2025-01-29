<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn-Adicionar'])) {

    $tituloEvento = strip_tags(mysqli_real_escape_string($conn, $_POST['tituloEvento']));
    $descricaoEvento = isset($_POST['descricaoEvento']) ? strip_tags(mysqli_real_escape_string($conn, $_POST['descricaoEvento'])) : '';
    $dataInicioEvento = strip_tags(mysqli_real_escape_string($conn, $_POST['dataInicioEvento']));
    $horaInicioEvento = strip_tags(mysqli_real_escape_string($conn, $_POST['horaInicioEvento']));
    $dataFimEvento = strip_tags(mysqli_real_escape_string($conn, $_POST['dataFimEvento']));
    $horaFimEvento = strip_tags(mysqli_real_escape_string($conn, $_POST['horaFimEvento']));

    $sql = "INSERT INTO tdeventos (
        tituloEvento,
        descricaoEvento,
        dataInicioEvento,
        horaInicioEvento,
        dataFimEvento,
        horaFimEvento
    ) VALUES (
        '{$tituloEvento}',
        '{$descricaoEvento}',
        '{$dataInicioEvento}',
        '{$horaInicioEvento}',
        '{$dataFimEvento}',
        '{$horaFimEvento}'
    )";

    $rs = mysqli_query($conn, $sql);
    if ($rs) {
        echo "<div class='alert alert-success'>Evento inserido com sucesso!";
        echo "<hr>";
        echo "<p class='mb-0'>
            <a class='text-success-emphasis' href='?menuop=eventos'>Voltar à lista de eventos.</a>
        </p>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao inserir o evento, tente novamente.</p>";
        echo "<hr>";
        echo "<p class='mb-0'>
            <a class='text-success-emphasis' href='?menuop=eventos'>Voltar à lista de eventos.</a>
        </p>";
        echo "</div>";
    }
}
?>
