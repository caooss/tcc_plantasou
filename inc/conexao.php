<?php
    $con=mysqli_connect("db4free.net", "plantasou", "plantasou", "plantasou");
    $con->set_charset("utf8");

    if(!$con){
        echo "Falha ao conectar ao banco";
    }
?>