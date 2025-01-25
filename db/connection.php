<?php
    include("config.php");
    $conn = mysqli_connect(SERVER, USER, PASSWORD, BASE) or die("Erro na conexão com o servidor!" . mysqli_connect_error());
?>