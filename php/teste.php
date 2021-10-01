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
    <a class="nav-link nav-link-color active dropdown-toggle" aria-current="page" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><img src="../imgs/tomates.png" width="20" height="20"/> Produtos</a>
?>

<button type="button" class="btn btn-color btn-outline-dark" aria-expanded="false"><a href="../php/remover_produto.php?id='.$resultado['cod_produto'].'" onclick="confirmacao()">Remover</a></button>

<button type="button" class="btn btn-color btn-outline-dark" data-bs-toggle="modal" data-bs-target="#produto_editar'.$produto.'">Editar</button> /*produtos*/