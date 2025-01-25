<header>
    <h3>Contatos</h3>
</header>
<div>
    <a href="index.php?menuop=cad-contato">Novo Contato</a>
</div>
<div>
    <form action="index.php?menuop=contatos" method="post">
        <input type="text" name="txt_pesquisa" id="">
        <input type="submit" value="Pesquisar">
    </form>
</div>
<table border="1">
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
        </tr>
    </thead>
    <tbody>
        <?php
            $quantity = 10;
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
            $txt_pesquisa = (isset($_POST["txt_pesquisa"])) ? $_POST["txt_pesquisa"] : "";

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
            DATE_FORMAT(dataNascContato, '%d/%m/%Y') AS dataNascContato
            FROM tdcontatos 
            WHERE idContato='{$txt_pesquisa}' OR
            nomeContato LIKE '%{$txt_pesquisa}%'
            ORDER BY  idContato ASC
            LIMIT $init, $quantity
            ";
            $rs = mysqli_query($conn, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conn));

            while($dados = mysqli_fetch_assoc($rs) ) {

        ?>
        <tr>
            <td><?=$dados["idContato"] ?></td>
            <td><?=$dados["nomeContato"] ?></td>
            <td><?=$dados["emailContato"] ?></td>
            <td><?=$dados["telefoneContato"] ?></td>
            <td><?=$dados["enderecoContato"] ?></td>
            <td><?=$dados["sexoContato"] ?></td>
            <td><?=$dados["dataNascContato"] ?></td>
            <td><a href="index.php?menuop=editar-contato&idContato=<?=$dados["idContato"] ?> ">Editar</a></td>
            <td><a href="index.php?menuop=excluir-contato&idContato=<?=$dados["idContato"] ?> ">Excluir</a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<br>
<?php

    $sqlTotal = "SELECT idContato FROM tdcontatos";
    $qrTotal = mysqli_query($conn, $sqlTotal) or die (mysqli_error($conn));
    $numTotal = mysqli_num_rows($qrTotal);
    $totalPagina = ceil($numTotal / $quantity);
    echo "Total de Registros: $numTotal <br>";
echo '<a href="?menuop=contatos&page=1">Primeira Página</a>';

if ($page > 1) {
    echo '<a href="?menuop=contatos&page=' . ($page - 1) . '"> << </a>';
}

for ($i = 1; $i <= $totalPagina; $i++) {
    if ($i >= ($page - 5) && $i <= ($page + 5)) {
        if ($i == $page) {
            echo $i;
        } else {
            echo '<a href="?menuop=contatos&page=' . $i . '">' . $i . '</a> ';
        }
    }
}

if ($page < $totalPagina) {
    echo '<a href="?menuop=contatos&page=' . ($page + 1) . '"> >> </a>';
}

echo '<a href="?menuop=contatos&page=' . $totalPagina . '">Última Página</a>'
?>