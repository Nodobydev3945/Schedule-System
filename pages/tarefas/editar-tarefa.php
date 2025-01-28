<?php
    $idTarefa = $_GET["idTarefa"];
    
    $sql = "SELECT * FROM tdtarefas WHERE idTarefa = '$idTarefa'";

    $rs = mysqli_query($conn, $sql) or die("Erro ao recuperar os dados do registro" . mysqli_error($conn));
    $dados = mysqli_fetch_assoc($rs);
?>
<br>
<header>
    <h3>Editar Tarefa</h3>
</header>
<div class="container">
    <form class="needs-validation" action="index.php?menuop=atualizar-tarefa" method="post" novalidate>
        <div class="mb-3">
            <label class="form-label" for="idTarefa">ID: </label>
            <div class="input-group input-group-lg"><span class="input-group-text"><i class="bi bi-key-fill"></i></span>
            <input class="form-control" type="number" name="idTarefa" value="<?= $dados["idTarefa"]?>" readonly>
        </div>
        <div class="mb-3" >
            <label class="form-label" for="tituloTarefa">Título: </label>
            <div class="input-group input-group-lg">
                <input class="form-control" type="text" name="tituloTarefa" value="<?= $dados["tituloTarefa"]?>" >
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="descricaoTarefa">Descrição: </label>
            <div class="input-group input-group-lg">
                <textarea name="descricaoTarefa" id="descricaoTarefa" cols="30" rows="4" class="form-control"><?=$dados["descricaoTarefa"]?> </textarea>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label class="form-label" for="dataConclusaoTarefa">Data de Conclusão: </label>
                <div class="input-group input-group-lg">
                    <input type="date" class="form-control" name="dataConclusaoTarefa" id="dataConclusaoTarefa" value="<?= $dados["dataConclusaoTarefa"]?>" >
                </div>
            </div>
            <div class="mb-3 col-6">
                <label class="form-label" for="horaConclusaoTarefa">Hora de Conclusão: </label>
                <div class="input-group input-group-lg">
                    <input type="time" class="form-control" name="horaConclusaoTarefa" id="horaConclusaoTarefa" value="<?= $dados["horaConclusaoTarefa"]?>" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label class="form-label" for="dataLembreteTarefa">Data de Lembrete: </label>
                <div class="input-group input-group-lg">
                    <input type="date" class="form-control" name="dataLembreteTarefa" id="dataLembreteTarefa" value="<?= $dados["dataLembreteTarefa"]?>" >
                </div>
            </div>
            <div class="mb-3 col-6">
                <label class="form-label" for="horaLembreteTarefa">Hora de Lembrete: </label>
                <div class="input-group input-group-lg">
                    <input type="time" class="form-control" name="horaLembreteTarefa" id="horaLembreteTarefa" value="<?= $dados["horaLembreteTarefa"]?>">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="recorrenciaTarefa">Recorrência da Tarefa: </label>
            <div class="input-group input-group-lg">
                <select name="recorrenciaTarefa" id="recorrenciaTarefa" class="form-select" value="<?= $dados["recorrenciaTarefa"]?>">
                    <option value="0" <?php echo ($dados["recorrenciaTarefa"] == 0) ? "selected" : ""; ?> >Não Recorrente</option>
                    <option value="1" <?php echo ($dados["recorrenciaTarefa"] == 1) ? "selected" : ""; ?> >Diariamente</option>
                    <option value="2" <?php echo ($dados["recorrenciaTarefa"] == 2) ? "selected" : ""; ?> >Semanalmente</option>
                    <option value="3" <?php echo ($dados["recorrenciaTarefa"] == 3) ? "selected" : ""; ?> >Mensalmente</option>
                    <option value="4" <?php echo ($dados["recorrenciaTarefa"] == 4) ? "selected" : ""; ?> >Anualmente</option>
                </select>
            </div>
        </div><br>
        <div class="mb-3 input-group-lg">
            <input class="btn btn-success" type="submit" value="Adicionar" name="btn-Adicionar">
        </div>
    </form>
</div>