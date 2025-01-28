<?php
    include("../../db/connection.php");
    
    $idContato = $_GET["idContato"];
    $flagFavoritoContato = $_GET["flagFavoritoContato"];

    $sql = "UPDATE tdcontatos SET flagFavoritoContato = {$flagFavoritoContato} WHERE idContato = {$idContato}";

    mysqli_query($conn, $sql);
?>