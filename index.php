<?php
    include("db/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/default-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Sistema de Agendamento 1.0</title>
</head>
<body>
<header class="bg-dark">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <img src="img/logo_agendador.png" alt="Sistema de Agendamento" width="120">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?menuop=home">Home</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menuop=contatos">Contato</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menuop=tarefas">Tarefas</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menuop=eventos">Eventos</a> 
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<br>
    <main>
        <div class="container">
        <?php
            $menuop = (isset($_GET["menuop"]))? $_GET["menuop"]:"home";
            switch ($menuop) {
                case 'home':
                    include("pages/home/home.php");
                    break;
                case 'contatos':
                    include("pages/contatos/contatos.php");
                    break;
                case 'cad-contato':
                    include("pages/contatos/cad-contato.php");
                    break;
                case 'inserir-contato':
                    include("pages/contatos/inserir-contato.php");
                    break;
                case 'editar-contato':
                    include("pages/contatos/editar-contato.php");
                    break;
                case 'atualizar-contato':
                    include("pages/contatos/atualizar-contato.php");
                    break;
                case 'excluir-contato':
                    include("pages/contatos/excluir-contato.php");
                    break;
                case 'tarefas':
                    include("pages/tarefas/tarefas.php");
                    break;   
                case 'eventos':
                    include("pages/eventos/eventos.php");
                    break;
                default:
                    include("pages/home/home.php");
                    break;
            }
        ?>
        </div>
    </main>
    <footer class="container-fluid fixed-bottom bg-dark">
        <div class="text-center">
            G.G.M - 🦖
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="./js/validation.js"></script>
    <script src="./js/jquery-3.7.1.slim.min.js"></script>
    <script src="./js/jquery-form.js"></script>
    <script src="./js/upload.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

</body>
</html>