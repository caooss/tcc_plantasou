<?php
    include('../inc/conexao_pdo.php');

    $id=$_GET['id'];
    $id=intval($id);

    $stmt=$conPDO->query("DELETE FROM usuario WHERE cod_usuario=$id");
    $stmt->execute;

    session_start();
    setcookie('USER', '',time() - 3600);
    header("Location: ../php/index.php");
    unset($_SESSION['itens']);

    echo $id;
    if(!$stmt){
        echo "Deu ruim";
    }

    header("location: ./home_user.php");
?>