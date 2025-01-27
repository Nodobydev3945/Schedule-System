<?php
    $idContato = $_GET["idContato"];
    $sql = "SELECT * FROM tdcontatos";
    $rs = mysqli_query($conn,$sql) or die("Erro ao recuperar os dados registrados 🐢" . mysqli_error($conn));
    $dados = mysqli_fetch_assoc($rs);
?>
<br>
<header>
    <h3><i class="bi bi-pencil-square"></i> Editar Contato</h3>
</header>
<div>
    <form class="needs-validation" novalidate action="index.php?menuop=atualizar-contato" method="post">
    <div class="valid-feedback">
        Preenchido.
    </div>
    <div class="invalid-feedback">
        Campo obrigatório (máximo de 200 caracteres).
    </div>
    <div class="mb-3 col-3">
        <label class="form-label" for="idContato">ID: </label>
        <div class="input-group input-group-lg"><span class="input-group-text"><i class="bi bi-key-fill"></i></span>
        <input class="form-control" type="number" name="idContato" value="<?= $dados["idContato"]?>" readonly>
    </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="nomeContato">Nome: </label>
            <div class="input-group input-group-lg"><span class="input-group-text"><i class="bi bi-person-fill"></i></span>
            <input class="form-control" type="text" name="nomeContato" value="<?= $dados["nomeContato"]?>">
        </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="emailContato">E-mail: </label>
            <div class="input-group input-group-lg"><span class="input-group-text">@</span>
            <input class="form-control" type="email" name="emailContato" value="<?= $dados["emailContato"]?>">
        </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="telefoneContato">Telefone: </label>
            <div class="input-group input-group-lg"><span class="input-group-text"><i class="bi bi-telephone"></i></span>
            <input class="form-control" type="tel" name="telefoneContato" placeholder="(xx) xxxxx-xxxx" value="<?= $dados["telefoneContato"]?>">
        </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="enderecoContato">Endereço: </label>
            <div class="input-group input-group-lg">
                <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
                <input class="form-control" type="text" name="enderecoContato" placeholder="Rua/Bairro/Avenida e nº" value="<?= $dados["enderecoContato"]?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="mb-3 col-6">
                <label class="form-label" for="sexoContato">Sexo: </label>
                <div class="input-group input-group-lg">                    <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                    <select class="form-select" name="sexoContato" id="sexoContato">
                        <option <?php ($dados['sexoContato']=='')?'selected':'' ?> >Selecione o sexo</option>
                        <option <?php ($dados['sexoContato']=='M')?'selected':'' ?> value="M">Masculino</option>
                        <option <?php ($dados['sexoContato']=='F')?'selected':'' ?> value="F">Feminino</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 col-6">
                <label class="form-label" for="dataNascContato">Data de Nascimento: </label>
                <div class="input-group input-group-lg">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input class="form-control" type="date" name="dataNascContato">
                </div>
            </div>
        </div>
        <div class="mb-3 input-group input-group-lg">
            <input class="btn btn-warning" type="submit" value="Atualizar" name="btn-Atualizar">
        </div>
    </form>
</div>