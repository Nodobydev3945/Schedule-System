<?php
$txt_pesquisa = (isset($_POST["txt_pesquisa"])) ? $_POST["txt_pesquisa"] : ""; // Verificar se os parâmetros estão definidos antes de executar o UPDATE
if (isset($_GET['idEvento']) && isset($_GET['statusEvento'])) {
    $idEvento = $_GET['idEvento'];
    $statusEvento = ($_GET['statusEvento'] == '0') ? '1' : '0';

    $sql = "UPDATE tdeventos SET statusEvento = {$statusEvento} WHERE idEvento = {$idEvento}";
    $rs = mysqli_query($conn, $sql);
}
?>
<br>
<header>
    <h3><i class="bi bi-calendar-check"></i> Eventos</h3>
</header>
<div>
    <a class="btn btn-outline-secondary mb-3" href="index.php?menuop=cad-evento"><i class="bi bi-file-plus-fill"></i> Novo Evento</a>
</div>
<div>
    <form action="index.php?menuop=eventos" method="post">
        <div class="input-group">
            <input class="form-control" type="text" name="txt_pesquisa" id="">
            <button class="btn btn-outline-success" type="submit" value="Pesquisar"><i class="bi bi-search"></i> Pesquisar</button>
        </div>
    </form>
</div>
<br>
<div class="tabela">
    <table class="table table-dark table-hover table-bordered table-lg">
        <thead>
            <tr>
                <th>Status</th>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data de Início</th>
                <th>Hora de Início</th>
                <th>Data de Finalização</th>
                <th>Hora de Finalização</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $quantity = 10;
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
            $init = ($quantity * $page) - $quantity;

            $sql = "SELECT
                        idEvento,
                        upper(tituloEvento) AS tituloEvento,
                        descricaoEvento,
                        DATE_FORMAT(dataInicioEvento, '%d/%m/%Y') AS dataInicioEvento,
                        horaInicioEvento,
                        DATE_FORMAT(dataFimEvento, '%d/%m/%Y') AS dataFimEvento,
                        horaFimEvento,
                        statusEvento
                    FROM tdeventos
                    WHERE idEvento='{$txt_pesquisa}' OR
                          tituloEvento LIKE '%{$txt_pesquisa}%' OR
                          descricaoEvento LIKE '%{$txt_pesquisa}%' OR DATE_FORMAT(dataInicioEvento, '%d/%m/%Y') LIKE '%{$txt_pesquisa}%'
                    ORDER BY statusEvento, dataInicioEvento ASC
                    LIMIT $init, $quantity
                    ";
            $rs = mysqli_query($conn, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conn));

            while($dados = mysqli_fetch_assoc($rs)) {
            ?>
            <tr>
                <td class="text-center">
                    <a class="btn btn-secondary btn-sm" href="index.php?menuop=eventos&page=<?=$page?>&idEvento=<?=$dados['idEvento']?>&statusEvento=<?=$dados['statusEvento']?>">
                        <?php
                            if($dados['statusEvento'] == 0) {
                                echo '<i class="bi bi-square"></i>';
                            } else {
                                echo '<i class="bi bi-check-square"></i>';
                            }
                        ?>
                    </a>
                </td>
                <td class="text-wrap"><?=$dados["idEvento"] ?></td>
                <td class="text-wrap"><?=$dados["tituloEvento"] ?></td>
                <td class="text-wrap"><?=$dados["descricaoEvento"] ?></td>
                <td class="text-wrap text-center"><?=$dados["dataInicioEvento"] ?></td>
                <td class="text-wrap text-center"><?=$dados["horaInicioEvento"] ?></td>
                <td class="text-wrap text-center"><?=$dados["dataFimEvento"] ?></td>
                <td class="text-wrap text-center"><?=$dados["horaFimEvento"] ?></td>
                <td class="text-center">
                    <a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-evento&idEvento=<?=$dados["idEvento"] ?>"><i class="bi bi-pencil-square"></i></a>
                </td>
                <td class="text-center">
                    <a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-evento&idEvento=<?=$dados["idEvento"] ?>"><i class="bi bi-trash-fill"></i></a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<ul class="pagination">
    <?php
    $sqlTotal = "SELECT idEvento FROM tdeventos";
    $qrTotal = mysqli_query($conn, $sqlTotal) or die (mysqli_error($conn));
    $numTotal = mysqli_num_rows($qrTotal);

    $totalPagina = ceil($numTotal / $quantity);

    echo '<li class="page-item"><span class="page-link"> Total de Registros: ' . $numTotal . '</span></li><br>';
    echo '<li class="page-item"> <a href="?menuop=eventos&page=1" class="page-link">Primeira Página</a> </li>';

    if ($page > 1) {
        echo '<li class="page-item"> <a class="page-link" href="?menuop=eventos&page=' . ($page - 1) . '"> << </a> </li>';
    }

    for ($i = 1; $i <= $totalPagina; $i++) {
        if ($i >= ($page - 5) && $i <= ($page + 5)) {
            if ($i == $page) {
                echo '<li class="page-item"><span class="page-link active">' . $i . '</span></li>';
            } else {
                echo '<li class="page-item"><a href="?menuop=eventos&page=' . $i . '" class="page-link"> ' . $i . '</a></li>';
            }
        }
    }

    if ($page < $totalPagina) {
        echo '<li class="page-item"> <a href="?menuop=eventos&page=' . ($page + 1) . '" class="page-link"> >> </a> </li>';
    }

    echo ' <li class="page-item"> <a href="?menuop=eventos&page=' . $totalPagina . '" class="page-link">Última Página</a> </li>';
    ?>
</ul>