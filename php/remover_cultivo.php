<?php
    include('../inc/conexao_pdo.php');

    $id=$_GET['id'];

    $stmt=$conPDO->query("DELETE FROM cultivo WHERE cod_cultivo=$id");
    $stmt->execute;

    header("location: ./cultivo.php");
?>