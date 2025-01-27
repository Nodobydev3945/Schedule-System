<header>
    <h3>Inserir Contato</h3>
</header>
<?php
    $nomeContato = mysqli_real_escape_string($conn,$_POST["nomeContato"]);
    $emailContato = mysqli_real_escape_string($conn,$_POST["emailContato"]);
    $telefoneContato = mysqli_real_escape_string($conn,$_POST["telefoneContato"]);
    $enderecoContato = mysqli_real_escape_string($conn,$_POST["enderecoContato"]);
    $sexoContato = mysqli_real_escape_string($conn,$_POST["sexoContato"]);
    $dataNascContato = mysqli_real_escape_string($conn,$_POST["dataNascContato"]);
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