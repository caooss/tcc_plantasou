<?php
    include('../inc/conexao_pdo.php');

    $id_p=$_GET['id_p'];
    $id_t=$_GET['id_t'];

    $stmt=$conPDO->query("DELETE FROM historico WHERE cod_produto=$id_p AND cod_tabela=$id_t");
    $stmt->execute;

    header("location: ./historico.php?num=0");
?>