<br>
<header class="container">
    <h3><i class="bi bi-calendar-check"></i> Cadastro de Evento</h3>
</header>
<div class="container">
    <form class="needs-validation" action="index.php?menuop=inserir-evento" method="post" novalidate>
        <div class="mb-3" >
            <label class="form-label" for="tituloEvento">Título: </label>
            <div class="input-group input-group-lg">
                <input class="form-control" type="text" name="tituloEvento" required>
                <div class="valid-feedback">
                    Preenchido.
                </div>
                <div class="invalid-feedback">
                    Campo obrigatório (máximo de 255 caracteres).
                </div>
            </div>
        </div>
        <div class="mb-3" >
            <label class="form-label" for="descricaoEvento">Descrição: </label>
            <div class="input-group input-group-lg">
                <textarea name="descricaoEvento" id="descricaoEvento" cols="30" rows="4" class="form-control" required></textarea>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label class="form-label" for="dataInicioEvento">Data de Início: </label>
                <div class="input-group input-group-lg">
                    <input type="date" class="form-control" name="dataInicioEvento" id="dataInicioEvento" required>
                </div>
            </div>
            <div class="mb-3 col-6">
                <label class="form-label" for="horaInicioEvento">Hora de Início: </label>
                <div class="input-group input-group-lg">
                    <input type="time" class="form-control" name="horaInicioEvento" id="horaInicioEvento" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label class="form-label" for="dataFimEvento">Data de Finalização: </label>
                <div class="input-group input-group-lg">
                    <input type="date" class="form-control" name="dataFimEvento" id="dataFimEvento">
                </div>
            </div>
            <div class="mb-3 col-6">
                <label class="form-label" for="horaFimEvento">Hora de Finalização: </label>
                <div class="input-group input-group-lg">
                    <input type="time" class="form-control" name="horaFimEvento" id="horaFimEvento">
                </div>
            </div>
        </div>
        <br>
        <div class="mb-3 input-group-lg">
            <input class="btn btn-success" type="submit" value="Adicionar" name="btn-Adicionar">
        </div>
    </form>
</div>