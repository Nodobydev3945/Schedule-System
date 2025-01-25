<?php
    include("db/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Agendamento 1.0</title>
</head>
<body>
    <header>
        <h1>Sistema de Agendamento 1.0</h1>
        <nav>
            <a href="index.php?menuop=home">Home</a> |
            <a href="index.php?menuop=contatos">Contato</a> |
            <a href="index.php?menuop=tarefas">Tarefas</a> |
            <a href="index.php?menuop=eventos">Eventos</a> |
        </nav>
    </header>
    <main>
        <hr>
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
        
    </main>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> -->
</body>
</html>