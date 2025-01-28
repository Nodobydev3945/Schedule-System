<br>
<header class="container">
    <h3><i class="bi bi-person-square"></i> Cadastro de Contato</h3>
</header>
<div class="container">
    <form class="needs-validation" action="index.php?menuop=inserir-contato" method="post" novalidate>
        <div class="mb-3" >
            <label class="form-label" for="nomeContato">Nome: </label>
            <div class="input-group input-group-lg">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                <input class="form-control" type="text" name="nomeContato" required>
                <div class="valid-feedback">
                    Preenchido.
                </div>
                <div class="invalid-feedback">
                    Campo obrigatório (máximo de 255 caracteres).
                </div>
            </div>
        </div>
        <div class="mb-3" >
            <label class="form-label" for="emailContato">E-mail: </label>
            <div class="input-group input-group-lg">
                <span class="input-group-text">@</span>
                <input class="form-control" type="email" name="emailContato" required>
            </div>
        </div>
        <div class="mb-3" >
            <label class="form-label" for="telefoneContato">Telefone: </label>
            <div class="input-group input-group-lg">
                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                <input class="form-control" type="tel" name="telefoneContato" placeholder="(xx) xxxxx-xxxx" required>
            </div>
        </div>
        <div class="mb-3" >
            <label class="form-label" for="enderecoContato">Endereço: </label>
            <div class="input-group input-group-lg">
                <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
                <input class="form-control" type="text" name="enderecoContato" placeholder="Rua/Bairro/Avenida e nº" required>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label class="form-label" for="sexoContato">Sexo: </label>
                <div class="input-group input-group-lg">
                    <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                    <select class="form-select" name="sexoContato" id="sexoContato" required>
                        <option selected >Selecione o sexo</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 col-6">
                <label class="form-label" for="dataNascContato">Data de Nascimento: </label>
                <div class="input-group input-group-lg">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input class="form-control" type="date" name="dataNascContato" required>
                </div>
            </div>
        </div><br>
        <div class="mb-3 input-group-lg">
            <input class="btn btn-success" type="submit" value="Adicionar" name="btn-Adicionar">
        </div>
    </form>
</div>