<?php
    include('../inc/conexao.php');

    $hidden=$_POST['hidden'];
    
    if($hidden==1){
        $nome=$_POST['nome'];
        $email=$_POST['email'];
        $senha=$_POST['senha'];

        $sql="INSERT INTO usuario (nome, senha, email) VALUE ('$nome', '$senha', '$email')";

        $insert=mysqli_query($con, $sql);

        if($insert){
            header("Location: ../php/index.php");
        }else{
            echo "";
        }

    }else{
        $email=$_POST['email'];
        $senha=$_POST['senha'];

        $sql="SELECT * FROM usuario";

        $query=mysqli_query($con, $sql);

        if(mysqli_num_rows($query)>0){
            while(($usuario=mysqli_fetch_assoc($query))!=NULL){
                if((((($email==$usuario['email']) && $email=="admin@admin.com")) && (($senha==$usuario['senha']) && $senha=="admin"))){
                    setcookie('ADM', 1, time()+600);
                    header("Location: ../php/home_adm.php");
                }else if($email==$usuario['email'] && $senha==$usuario['senha']){
                    setcookie('USER', $usuario['cod_usuario'], time()+600);
                    header("Location: ../php/home_user.php");
                }
            }
        }
    }

    include('../inc/disconnect.php');
    
?>