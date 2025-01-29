<?php
    $idEvento = $_GET["idEvento"];
    
    $sql = "SELECT * FROM tdEventos WHERE idEvento = '$idEvento'";

    $rs = mysqli_query($conn, $sql) or die("Erro ao recuperar os dados do registro" . mysqli_error($conn));
    $dados = mysqli_fetch_assoc($rs);
?>
<br>
<header>
    <h3><i class="bi bi-calendar-check"></i> Editar Evento</h3>
</header>
<div class="container">
    <form class="needs-validation" action="index.php?menuop=atualizar-evento" method="post" novalidate>
        <div class="mb-3">
            <label class="form-label" for="idEvento">ID: </label>
            <div class="input-group input-group-lg"><span class="input-group-text"><i class="bi bi-key-fill"></i></span>
            <input class="form-control" type="number" name="idEvento" value="<?= $dados["idEvento"]?>" readonly>
        </div>
        <div class="mb-3" >
            <label class="form-label" for="tituloEvento">Título: </label>
            <div class="input-group input-group-lg">
                <input class="form-control" type="text" name="tituloEvento" value="<?= $dados["tituloEvento"]?>" >
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="descricaoEvento">Descrição: </label>
            <div class="input-group input-group-lg">
                <textarea name="descricaoEvento" id="descricaoEvento" cols="30" rows="4" class="form-control"><?=$dados["descricaoEvento"]?> </textarea>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label class="form-label" for="dataInicioEvento">Data de Início: </label>
                <div class="input-group input-group-lg">
                    <input type="date" class="form-control" name="dataInicioEvento" id="dataInicioEvento" value="<?= $dados["dataInicioEvento"]?>" >
                </div>
            </div>
            <div class="mb-3 col-6">
                <label class="form-label" for="horaInicioEvento">Hora de Início: </label>
                <div class="input-group input-group-lg">
                    <input type="time" class="form-control" name="horaInicioEvento" id="horaInicioEvento" value="<?= $dados["horaInicioEvento"]?>" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label class="form-label" for="dataFimEvento">Data de Fim: </label>
                <div class="input-group input-group-lg">
                    <input type="date" class="form-control" name="dataFimEvento" id="dataFimEvento" value="<?= $dados["dataFimEvento"]?>" >
                </div>
            </div>
            <div class="mb-3 col-6">
                <label class="form-label" for="horaFimEvento">Hora de Fim: </label>
                <div class="input-group input-group-lg">
                    <input type="time" class="form-control" name="horaFimEvento" id="horaFimEvento" value="<?= $dados["horaFimEvento"]?>">
                </div>
            </div>
        </div>
        <br>
        <div class="mb-3 input-group-lg">
            <input class="btn btn-success" type="submit" value="Adicionar" name="btn-Adicionar">
        </div>
    </form>
</div>