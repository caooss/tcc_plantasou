<?php
    include('../inc/conexao.php');

    $id=$_GET['id'];
    $sql= "DELETE FROM produto WHERE cod_produto=$id";

    $query= mysqli_query($con, $sql);

    header("location: ./produtos.php");
?>