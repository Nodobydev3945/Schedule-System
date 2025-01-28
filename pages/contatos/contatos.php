<?php
    $txt_pesquisa = (isset($_POST["txt_pesquisa"])) ? $_POST["txt_pesquisa"] : "";
?>
<br>
<header>
    <h3><i class="bi bi-person-square"></i> Contatos</h3>
</header>
<div>
    <a class="btn btn-outline-secondary mb-3" href="index.php?menuop=cad-contato"><i class="bi bi-person-plus-fill"></i> Novo Contato</a>
</div>
<div>
    <form action="index.php?menuop=contatos" method="post">
        <div class="input-group">
            <input class="form-control" type="text" name="txt_pesquisa" value="<?=$txt_pesquisa?>">
            <button class="btn btn-outline-success" type="submit" value="Pesquisar"><i class="bi bi-search"></i> Pesquisar</button>
        </div>
    </form>
</div>
<br>
<div class="tabela">
<table class="table table-dark table-hover table-bordered table-lg">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Sexo</th>
            <th>Data de Nascimento</th>
            <th>Editar</th>
            <th>Excluir</th>
            <th>Favorito</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $quantity = 10;
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

            $init = ($quantity * $page) - $quantity;


            $sql = "SELECT 
            idContato,
            upper(nomeContato) AS nomeContato,
            lower(emailContato) AS emailContato,
            telefoneContato,
            upper(enderecoContato) AS enderecoContato,
            CASE 
                WHEN sexoContato='F' THEN 'FEMININO'
                WHEN sexoContato='M' THEN 'MASCULINO'
            ELSE
                'NÃO ESPECÍFICADO'
            END AS sexoContato,
            DATE_FORMAT(dataNascContato, '%d/%m/%Y') AS dataNascContato,
            flagFavoritoContato
            FROM tdcontatos 
            WHERE idContato='{$txt_pesquisa}' OR
            nomeContato LIKE '%{$txt_pesquisa}%'
            ORDER BY flagFavoritoContato DESC, idContato ASC
            LIMIT $init, $quantity
            ";
            $rs = mysqli_query($conn, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conn));

            while($dados = mysqli_fetch_assoc($rs) ) {

        ?>
        <tr>
            <td class="text-nowrap"><?=$dados["idContato"] ?></td>
            <td class="text-nowrap"><?=$dados["nomeContato"] ?></td>
            <td class="text-nowrap"><?=$dados["emailContato"] ?></td>
            <td class="text-nowrap"><?=$dados["telefoneContato"] ?></td>
            <td class="text-nowrap"><?=$dados["enderecoContato"] ?></td>
            <td class="text-nowrap"><?=$dados["sexoContato"] ?></td>
            <td class="text-nowrap"><?=$dados["dataNascContato"] ?></td>
            <td class="text-center"><a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-contato&idContato=<?=$dados["idContato"] ?> "><i class="bi bi-pencil-square"></i></a></td>
            <td class="text-center"><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-contato&idContato=<?=$dados["idContato"] ?> "><i class="bi bi-trash-fill"></i></a></td>
            <td class="text-center">
                <?php
                    if($dados["flagFavoritoContato"] == 1) {
                        echo "<a href=\"#\" class=\"flagFavoritoContato link-warning\" title=\"Favorito\" id=\"{$dados["idContato"]}\">
                        <i class=\"bi bi-star-fill\"></i>
                        </a>";
                    } else {
                        echo "<a href=\"#\" class=\"flagFavoritoContato link-warning\" title=\"Não Favorito\" id=\"{$dados["idContato"]}\">
                        <i class=\"bi bi-star\"></i>
                        </a>";
                    }
                ?>
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
    $sqlTotal = "SELECT idContato FROM tdcontatos";
    $qrTotal = mysqli_query($conn, $sqlTotal) or die (mysqli_error($conn));
    $numTotal = mysqli_num_rows($qrTotal);

    $totalPagina = ceil($numTotal / $quantity);

    echo '<li class="page-item"><span class="page-link"> Total de Registros: ' . $numTotal . '</span></li><br>';
    echo '<li class="page-item"> <a href="?menuop=contatos&page=1" class="page-link">Primeira Página</a> </li>';

    if ($page > 1) {
        echo '<li class="page-item"> <a class="page-link" href="?menuop=contatos&page=' . ($page - 1) . '"> << </a> </li>';
    }

    for ($i = 1; $i <= $totalPagina; $i++) {
        if ($i >= ($page - 5) && $i <= ($page + 5)) {
            if ($i == $page) {
                echo '<li class="page-item"><span class="page-link active">' . $i . '</span></li>';
            } else {
                echo '<li class="page-item"><a href="?menuop=contatos&page=' . $i . '" class="page-link"> ' . $i . '</a></li>';
            }
        }
    }

    if ($page < $totalPagina) {
        echo '<li class="page-item"> <a href="?menuop=contatos&page=' . ($page + 1) . '" class="page-link"> >> </a> </li>';
    }

    echo ' <li class="page-item"> <a href="?menuop=contatos&page=' . $totalPagina . '" class="page-link">Última Página</a> </li>';
    ?>
</ul>

</ul>