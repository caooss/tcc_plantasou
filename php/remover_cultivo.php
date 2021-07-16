<?php
    include('../inc/conexao.php');

    $id=$_GET['id'];
    $sql= "DELETE FROM cultivo WHERE cod_cultivo=$id";

    $query= mysqli_query($con, $sql);

    header("location: ./cultivo.php");
?>