<?php
    $con=mysqli_connect("sql10.freesqldatabase.com", "sql10453763", "sql10453763", "lpt3JvcYKt");
    $con->set_charset("utf8");

    if(!$con){
        echo "Falha ao conectar ao banco";
    }
?>