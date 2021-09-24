<?php
    include('../inc/conexao.php');
    include('../inc/conexao_pdo.php');

    $hidden=$_POST['hidden'];

    if($hidden==1){
        $nome=$_POST['nome'];
        $email=$_POST['email'];
        $senha=$_POST['senha'];

        $stmt=$conPDO->query("SELECT email FROM usuario WHERE email='$email'");
        $stmt->execute();

        if($stmt){
            header('Location: ./erro_email.php');
        }else{
            echo "email cadastrado";
        }

        /*$sql="INSERT INTO usuario (nome, senha, email) VALUE ('$nome', '$senha', '$email')";

        $insert=mysqli_query($con, $sql);*/

        /*if($sql){
            header("Location: ../php/index.php");
        }else{
            echo "Deu ruim";
        }*/

    }else{
        $email=$_POST['email'];
        $senha=$_POST['senha'];
        echo $email, $senha;

        $sql="SELECT * FROM usuario";

        $query=mysqli_query($con, $sql);

        if(mysqli_num_rows($query)>0){
            while(($usuario=mysqli_fetch_assoc($query))!=NULL){
                if((((($email==$usuario['email']) && $email=="admin@admin.com")) && (($senha==$usuario['senha']) && $senha=="admin"))){
                    setcookie('ADM', 1, time()+1800);
                    header("Location: ../php/home_adm.php");
                }else if(($email==$usuario['email']) && ($senha==$usuario['senha'])){
                    setcookie('USER', $usuario['cod_usuario'], time()+1800);
                    echo "deu ruim";
                    header("Location: ../php/home_user.php");
                }
            }
            echo "Bom dia, parece que algo deu errado em...";
        }
    }

    include('../inc/disconnect.php');
    
?>