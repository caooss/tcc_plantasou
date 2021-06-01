<?php
    $con=mysqli_connect("localhost", "rafael", "rafael", "plantasou");
    $con->set_charset("utf8");

    if(!$con){
        echo "Falha ao conectar ao banco";
    }
?>