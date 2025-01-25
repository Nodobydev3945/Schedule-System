<header>
    <h3>Atualizar Contato</h3>
</header>
<?php
    $idContato = mysqli_real_escape_string($conn,$_POST["idContato"]);
    $nomeContato = mysqli_real_escape_string($conn,$_POST["nomeContato"]);
    $emailContato = mysqli_real_escape_string($conn,$_POST["emailContato"]);
    $telefoneContato = mysqli_real_escape_string($conn,$_POST["telefoneContato"]);
    $enderecoContato = mysqli_real_escape_string($conn,$_POST["enderecoContato"]);
    $sexoContato = mysqli_real_escape_string($conn,$_POST["sexoContato"]);
    $dataNascContato = mysqli_real_escape_string($conn,$_POST["dataNascContato"]);
    $sql = "UPDATE tdcontatos SET
    nomeContato = '{$nomeContato}',
    emailContato = '{$emailContato}',
    telefoneContato = '{$telefoneContato}',
    enderecoContato = '{$enderecoContato}',
    sexoContato = '{$sexoContato}',
    dataNascContato = '{$dataNascContato}'
    WHERE idContato = '{$idContato}'
    ";
        mysqli_query($conn,$sql) or die("Erro ao executar a atualização. " . mysqli_error($conn));

        echo ("O registro foi inserido com sucesso! 🦖");
?>