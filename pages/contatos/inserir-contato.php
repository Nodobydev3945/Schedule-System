<header>
    <h3>Inserir Contato</h3>
</header>
<?php
    $nomeContato = strip_tags(mysqli_real_escape_string($conn,$_POST["nomeContato"]));
    $emailContato = strip_tags(mysqli_real_escape_string($conn,$_POST["emailContato"]));
    $telefoneContato = strip_tags(mysqli_real_escape_string($conn,$_POST["telefoneContato"]));
    $enderecoContato = strip_tags(mysqli_real_escape_string($conn,$_POST["enderecoContato"]));
    $sexoContato = strip_tags(mysqli_real_escape_string($conn,$_POST["sexoContato"]));
    $dataNascContato = strip_tags(mysqli_real_escape_string($conn,$_POST["dataNascContato"]));
    $sql = "INSERT INTO tdcontatos (nomeContato,
        emailContato,
        telefoneContato,
        enderecoContato,
        sexoContato,
        dataNascContato)
        VALUES(
            '{$nomeContato}',
            '{$emailContato}',
            '{$telefoneContato}',
            '{$enderecoContato}',
            '{$sexoContato}',
            '{$dataNascContato}'
        )
    ";
    mysqli_query($conn,$sql) or die("Erro ao executar a consulta. " . mysqli_error($conn));

    echo ("O registro foi inserido com sucesso! 🦖 ");
?>