<?php
    include('../inc/conexao_pdo.php');

    $id=$_GET['id'];
    $id=intval($id);

    $stmt=$conPDO->query("DELETE FROM produto WHERE cod_produto=$id");
    $stmt->execute;

    echo $id;
    if(!$stmt){
        echo "Deu ruim";
    }

    header("location: ./produtos.php");
?>