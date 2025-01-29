<br>
<header>
    <h3>Excluir Evento</h3>
</header>
<?php
    $idEvento = $_GET['idEvento'];

    $sql = "DELETE FROM tdeventos WHERE idEvento = '{$idEvento}'";
    $rs = mysqli_query($conn, $sql);

    if ($rs) {
        echo "<div class='alert alert-success'>Evento excluído com sucesso!";
        echo "<hr>";
        echo "<p class='mb-0'>
            <a class='text-success-emphasis' href='?menuop=eventos'>Voltar à lista de Eventos.</a>
        </p>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao excluir o evento, tente novamente.</p>";
        echo "<hr>";
        echo "<p class='mb-0'>
            <a class='text-success-emphasis' href='?menuop=eventos'>Voltar à lista de Eventos.</a>
        </p>";
        echo "</div>";
    }
?>