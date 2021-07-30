<?php
    include("../inc/conexao_pdo.php");

    $stmt=$conPDO->query("SELECT cod_tabela FROM historico GROUP BY cod_tabela");
    $i=$stmt->rowCount();
    echo $i;
    /*while($row=$stmt->fetch(PDO::FETCH_OBJ)){
        /*echo $row->cod_historico." // ";
        echo $row->cod_usuario." // ";
        echo $row->cod_produto." // ";
        echo $row->quantidade_produto." // ";
        echo $row->data_." // ";
        echo $row->total." // ";
        echo $row->cod_tabela."<br>";
        echo $row->COUNT(*)."<br>";
    }*/
?>