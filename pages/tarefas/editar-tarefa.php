<?php
    $idTarefa = $_GET["idTarefa"];
    $sql = "SELECT * FROM tdtarefas";
    $rs = mysqli_query($conn,$sql) or die("Erro ao recuperar os dados registrados 🐢" . mysqli_error($conn));
    $dados = mysqli_fetch_assoc($rs);
?>
<br>
<header>
    <h3><i class="bi bi-pencil-square"></i> Editar Contato</h3>
</header>
<div class="row">
<div class="col-6">
    <form class="needs-validation" novalidate action="index.php?menuop=atualizar-tarefa" method="post">
    <div class="valid-feedback">
        Preenchido.
    </div>
    <div class="invalid-feedback">
        Campo obrigatório (máximo de 200 caracteres).
    </div>
    <div class="mb-3 col-3">
        <label class="form-label" for="idTarefa">ID: </label>
        <div class="input-group input-group-lg"><span class="input-group-text"><i class="bi bi-key-fill"></i></span>
        <input class="form-control" type="number" name="idTarefa" value="<?= $dados["idTarefa"]?>" readonly>
    </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="tituloTarefa">Título da Tarefa: </label>
            <div class="input-group input-group-lg"><span class="input-group-text"><i class="bi bi-person-fill"></i></span>
            <input class="form-control" type="text" name="tituloTarefa" value="<?= $dados["tituloTarefa"]?>">
        </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="descricaoTarefa">Descrição: </label>
            <div class="input-group input-group-lg"><span class="input-group-text">@</span>
            <input class="form-control" type="textarea" name="descricaoTarefa" value="<?= $dados["descricaoTarefa"]?>">
        </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="dataConclusaoTarefa">Data de Conclusão: </label>
            <div class="input-group input-group-lg"><span class="input-group-text"><i class="bi bi-telephone"></i></span>
            <input class="form-control" type="date" name="dataConclusaoTarefa" value="<?= $dados["dataConclusaoTarefa"]?>">
        </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="horaConclusaoTarefa">Hora de Conclusão: </label>
            <div class="input-group input-group-lg">
                <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
                <input class="form-control" type="time" name="horaConclusaoTarefa"  value="<?= $dados["horaConclusaoTarefa"]?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="mb-3 col-6">
                <label class="form-label" for="dataLembreteTarefa">Data de Lembrete: </label>
                <div class="input-group input-group-lg">
                    <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
                    <input class="form-control" type="date" name="dataLembreteTarefa" value="<?= $dados["dataLembreteTarefa"]?>">
                </div>
            </div>
            <div class="mb-3 col-6">
            <label class="form-label" for="horaLembreteTarefa">Hora de Lembrete: </label>
                <div class="input-group input-group-lg">
                    <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
                    <input class="form-control" type="time" name="horaLembreteTarefa" value="<?= $dados["horaLembreteTarefa"]?>">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="recorrenciaTarefa">Recorrência da Tarefa: </label>
            <div class="input-group input-group-lg">
                <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
                <input class="form-control" type="number" name="recorrenciaTarefa"  value="<?= $dados["recorrenciaTarefa"]?>">
            </div>
        </div>
        <div class="mb-3 input-group input-group-lg">
            <input class="btn btn-warning" type="submit" value="Atualizar" name="btn-Atualizar">
        </div>
    </form>
</div>
<div class="col-6">
    <?php
       if($dados["nomeFotoContato"]=="" || !file_exists('./paginas/contatos/fotos-contatos/'. $dados["nomeFotoContato"])){
            $nomeFoto = "SemFoto.jpg";
       }else{
            $nomeFoto = $dados["nomeFotoContato"];
       }
    ?>
    <div class="mb-3">
        <img id="foto-contato" class="img-fluid img-thumbnail" width="200" src="./pages/contatos/fotos-contatos/<?=$nomeFoto?>" alt="Foto do Contato">
    </div>

    <div class="mb-3">
        <button class="btn btn-info" id="btn-editar-foto">
            <i class="bi bi-camera-fill"></i> Editar Foto
        </button>
    </div>
    <div id="editar-foto">
                <form id="form-upload-foto" class="mb-3" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="idContato" value="<?=$idContato?>">
                <label class="form-label" for="arquivo">Selecione um arquivo de imagem da foto</label>
                    <div class="input-group">
                        <input class="form-control" type="file" name="arquivo" id="arquivo">
                        <input id="btn-enviar-foto" class="btn btn-secondary" type="submit" value="Enviar">
                    </div>

                </form>
                <div id="mensagem" class="mb-3 alert alert-success">
                    
                </div>
                <div id="preloader" class="progress">
                    <div id="barra"
                    class="progress-bar bg-danger" 
                    role="progressbar" 
                    style="width: 0%" 
                    aria-valuenow="0" 
                    aria-valuemin="0" 
                    aria-valuemax="100">0%</div>
                </div>  
    </div>  
</div>
</div>