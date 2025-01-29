<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/default-style.css">
    <title>Login - Agendamento</title>
</head>
<body>
    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4 p-4 bg-white shadow rounded">
                <div class="row justify-content-center mb-4">
                    <img src="./img/logo_agendador.png" alt="Agendador" srcset="">
                </div>
                <form class="needs-validation" action="index.php" method="post" novalidate>
                    <div class="form-group">
                        <label class="" for="loginUser">Login: </label>
                        <div class="input-group mb-4">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input class="form-control" type="text" name="loginUser" id="loginUser" required>
                            <div class="invalid-feedback">
                                Informe o username.
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="" for="passUser">Senha: </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                            <input class="form-control" type="password" name="passUser" id="passUser" required>
                            <div class="invalid-feedback">
                                Informe a senha.
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success w-100"><i class="bi bi-box-arrow-right"></i> Entrar</button>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="./js/validation.js"></script>
</body>
</html>