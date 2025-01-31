<?php
    $pass = "123456";
    $passCripo = hash('sha256', $pass);

    var_dump($pass);
    echo "<br>";
    var_dump($passCripo);
?>