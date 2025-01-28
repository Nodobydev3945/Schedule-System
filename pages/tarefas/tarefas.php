<?php
    $txt_pesquisa = (isset($_POST["txt_pesquisa"])) ? $_POST["txt_pesquisa"] : "";

 // Verificar se os parâmetros estão definidos antes de executar o UPDATE
if (isset($_GET['idTarefa']) && isset($_GET['statusTarefa'])) {
    $idTarefa = $_GET['idTarefa'];
    $statusTarefa = ($_GET['statusTarefa'] == '0') ? '1' : '0';

    $sql = "UPDATE tdtarefas SET statusTarefa = {$statusTarefa} WHERE idTarefa = {$idTarefa}";
    $rs = mysqli_query($conn, $sql);
}
?>
<br>
<header>
    <h3><i class="bi bi-list-task"></i> Tarefas</h3>
</header>
<div>
    <a class="btn btn-outline-secondary mb-3" href="index.php?menuop=cad-tarefa"><i class="bi bi-file-plus-fill"></i> Nova Tarefa</a>
</div>
<div>
    <form action="index.php?menuop=tarefas" method="post">
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
            <th>Data da Conclusão</th>
            <th>Hora da Conclusão</th>
            <th>Data de Lembrete</th>
            <th>Hora de Lembrete</th>
            <th>Recorrência</th>
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
            idTarefa,
            upper(tituloTarefa) AS tituloTarefa,
            descricaoTarefa,
            DATE_FORMAT(dataConclusaoTarefa, '%d/%m/%Y') AS dataConclusaoTarefa,
            horaConclusaoTarefa,
            DATE_FORMAT(dataLembreteTarefa, '%d/%m/%Y') AS dataLembreteTarefa,
            horaLembreteTarefa,
            recorrenciaTarefa,
            statusTarefa
            FROM tdtarefas 
            WHERE idTarefa='{$txt_pesquisa}' OR
            tituloTarefa LIKE '%{$txt_pesquisa}%' OR
            descricaoTarefa LIKE '%{$txt_pesquisa}%' OR DATE_FORMAT(dataConclusaoTarefa, '%d/%m/%Y') LIKE '%{$txt_pesquisa}%'
            ORDER BY  statusTarefa, dataConclusaoTarefa ASC
            LIMIT $init, $quantity
            ";
            $rs = mysqli_query($conn, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conn));

            while($dados = mysqli_fetch_assoc($rs) ) {

        ?>
        <tr>
            <td class="text-center">
                <a class="btn btn-secondary btn-sm" href="index.php?menuop=tarefas&page=<?=$page?>&idTarefa=<?=$dados['idTarefa']?>&statusTarefa=<?=$dados['statusTarefa']?>">
                    <?php
                        if($dados['statusTarefa'] == 0) {
                            echo '<i class="bi bi-square"></i>';
                        } else {
                            echo '<i class="bi bi-check-square"></i>';
                        }
                    ?>
                </a>
            </td>
            <td class="text-wrap"><?=$dados["idTarefa"] ?></td>
            <td class="text-wrap"><?=$dados["tituloTarefa"] ?></td>
            <td class="text-wrap"><?=$dados["descricaoTarefa"] ?></td>
            <td class="text-wrap text-center"><?=$dados["dataConclusaoTarefa"] ?></td>
            <td class="text-wrap text-center"><?=$dados["horaConclusaoTarefa"] ?></td>
            <td class="text-wrap text-center"><?=$dados["dataLembreteTarefa"] ?></td>
            <td class="text-wrap text-center"><?=$dados["horaLembreteTarefa"] ?></td>
            <td class="text-wrap text-center">
                <?php
                    $reco = $dados['recorrenciaTarefa'];
                    switch ($reco) {
                        case 1:
                            echo "Diariamente";
                            break;
                        case 2:
                            echo "Semanalmente";
                            break;
                        case 3:
                            echo "Mensalmente";
                            break;
                        case 4:
                            echo "Anualmente";
                            break;
                        default:
                            echo "Não Recorrente";
                            break;
                    }
                ?>
            </td>
            <td class="text-center"><a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-tarefa&idTarefa=<?=$dados["idTarefa"] ?> "><i class="bi bi-pencil-square"></i></a></td>
            <td class="text-center"><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-tarefa&idTarefa=<?=$dados["idTarefa"] ?> "><i class="bi bi-trash-fill"></i></a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
</div>
<ul class="pagination">
    <?php
    $sqlTotal = "SELECT idTarefa FROM tdtarefas";
    $qrTotal = mysqli_query($conn, $sqlTotal) or die (mysqli_error($conn));
    $numTotal = mysqli_num_rows($qrTotal);

    $totalPagina = ceil($numTotal / $quantity);

    echo '<li class="page-item"><span class="page-link"> Total de Registros: ' . $numTotal . '</span></li><br>';
    echo '<li class="page-item"> <a href="?menuop=tarefas&page=1" class="page-link">Primeira Página</a> </li>';

    if ($page > 1) {
        echo '<li class="page-item"> <a class="page-link" href="?menuop=tarefas&page=' . ($page - 1) . '"> << </a> </li>';
    }

    for ($i = 1; $i <= $totalPagina; $i++) {
        if ($i >= ($page - 5) && $i <= ($page + 5)) {
            if ($i == $page) {
                echo '<li class="page-item"><span class="page-link active">' . $i . '</span></li>';
            } else {
                echo '<li class="page-item"><a href="?menuop=tarefas&page=' . $i . '" class="page-link"> ' . $i . '</a></li>';
            }
        }
    }

    if ($page < $totalPagina) {
        echo '<li class="page-item"> <a href="?menuop=tarefas&page=' . ($page + 1) . '" class="page-link"> >> </a> </li>';
    }

    echo ' <li class="page-item"> <a href="?menuop=tarefas&page=' . $totalPagina . '" class="page-link">Última Página</a> </li>';
    ?>
</ul>

</ul>