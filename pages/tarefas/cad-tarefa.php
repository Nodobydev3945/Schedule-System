<br>
<header class="container">
    <h3><i class="bi bi-list-task"></i> Cadastro de Tarefa</h3>
</header>
<div class="container">
    <form class="needs-validation" action="index.php?menuop=inserir-tarefa" method="post" novalidate>
        <div class="mb-3" >
            <label class="form-label" for="tituloTarefa">Título: </label>
            <div class="input-group input-group-lg">
                <input class="form-control" type="text" name="tituloTarefa" required>
                <div class="valid-feedback">
                    Preenchido.
                </div>
                <div class="invalid-feedback">
                    Campo obrigatório (máximo de 255 caracteres).
                </div>
            </div>
        </div>
        <div class="mb-3" >
            <label class="form-label" for="descricaoTarefa">Descrição: </label>
            <div class="input-group input-group-lg">
                <textarea name="descricaoTarefa" id="descricaoTarefa" cols="30" rows="4" class="form-control" required></textarea>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label class="form-label" for="dataConclusaoTarefa">Data de Conclusão: </label>
                <div class="input-group input-group-lg">
                    <input type="date" class="form-control" name="dataConclusaoTarefa" id="dataConclusaoTarefa" required>
                </div>
            </div>
            <div class="mb-3 col-6">
                <label class="form-label" for="horaConclusaoTarefa">Hora de Conclusão: </label>
                <div class="input-group input-group-lg">
                    <input type="time" class="form-control" name="horaConclusaoTarefa" id="horaConclusaoTarefa" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label class="form-label" for="dataLembreteTarefa">Data de Lembrete: </label>
                <div class="input-group input-group-lg">
                    <input type="date" class="form-control" name="dataLembreteTarefa" id="dataLembreteTarefa">
                </div>
            </div>
            <div class="mb-3 col-6">
                <label class="form-label" for="horaLembreteTarefa">Hora de Lembrete: </label>
                <div class="input-group input-group-lg">
                    <input type="time" class="form-control" name="horaLembreteTarefa" id="horaLembreteTarefa">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="recorrenciaTarefa">Recorrência da Tarefa: </label>
            <div class="input-group input-group-lg">
                <select name="recorrenciaTarefa" id="recorrenciaTarefa" class="form-select">
                    <option value="0" selected>Não Recorrente</option>
                    <option value="1">Diariamente</option>
                    <option value="2">Semanalmente</option>
                    <option value="3">Mensalmente</option>
                    <option value="4">Anualmente</option>
                </select>
            </div>
        </div><br>
        <div class="mb-3 input-group-lg">
            <input class="btn btn-success" type="submit" value="Adicionar" name="btn-Adicionar">
        </div>
    </form>
</div>