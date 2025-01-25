<header>
    <h3>Excluir Contato</h3>
</header>
<?php
    $idContato = mysqli_real_escape_string($conn,$_GET["idContato"]);
    $sql = "DELETE FROM tdcontatos WHERE idContato = '{$idContato}'";
    mysqli_query($conn, $sql) or die ("Erro ao excluir o registro" . mysqli_error($conn));
    echo "Registro excluído com sucesso 🦖";
?>