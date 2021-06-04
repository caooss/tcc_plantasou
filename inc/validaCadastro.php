<?php
    $email=$_POST['email'];
    $senha=$_POST['senha'];

    include('../inc/conexao.php');

    $sql="SELECT * FROM usuario";

    $query=mysqli_query($con, $sql);

    if(mysqli_num_rows($query)>0){
      while(($usuario=mysqli_fetch_assoc($query))!=NULL){
        if((((($email==$usuario['email']) && $email=="admin@admin.com")) && (($senha==$usuario['senha']) && $senha=="admin"))){
            setcookie('ADM', 1, time()+600);
            header("Location: ../php/home_adm.php");
        }else if((($email==$usuario['email']) && ($senha==$usuario['senha']))){
            setcookie('USER', $usuario['cod_usuario'], time()+600);
            header("Location: ../php/home_user.php");
        }
      }
    }
?>