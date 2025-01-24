<?php
    include("db/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
    
</body>
</html>