<?php
    $idContato = $_GET["idContato"];
    $sql = "SELECT * FROM tdcontatos";
    $rs = mysqli_query($conn,$sql) or die("Erro ao recuperar os dados registrados 🐢" . mysqli_error($conn));
    $dados = mysqli_fetch_assoc($rs);
?>
<header>
    <h3>Editar Contato</h3>
</header>
<div>
    <form action="index.php?menuop=atualizar-contato" method="post">
        <div>
            <label for="idContato">ID: </label>
            <input type="number" name="idContato" value="<?= $dados["idContato"]?>">
        </div>
        <div>
            <label for="nomeContato">Nome: </label>
            <input type="text" name="nomeContato" value="<?= $dados["nomeContato"]?>">
        </div>
        <div>
            <label for="emailContato">E-mail: </label>
            <input type="email" name="emailContato" value="<?= $dados["emailContato"]?>">
        </div>
        <div>
            <label for="telefoneContato">Telefone: </label>
            <input type="tel" name="telefoneContato" placeholder="(xx) xxxxx-xxxx" value="<?= $dados["telefoneContato"]?>">
        </div>
        <div>
            <label for="enderecoContato">Endereço: </label>
            <input type="text" name="enderecoContato" placeholder="Rua/Bairro/Avenida e nº" value="<?= $dados["enderecoContato"]?>">
        </div>
        <div>
            <label for="sexoContato">Sexo: </label>
            <input type="text" name="sexoContato" value="<?= $dados["sexoContato"]?>">
        </div>
        <div>
            <label for="dataNascContato">Data de Nascimento: </label>
            <input type="date" name="dataNascContato" value="<?= $dados["dataNascContato"]?>">
        </div>
        <div>
            <input type="submit" value="Atualizar" name="btn-Atualizar">
        </div>
    </form>
</div>