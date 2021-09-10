<?php
    include('../inc/conexao_pdo.php');

    $id=$_GET['id'];

    $stmt=$conPDO->query("DELETE FROM historico WHERE cod_tabela=$id");
    $stmt->execute;

    header("location: ./historico.php");
?>