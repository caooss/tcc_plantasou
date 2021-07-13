<?php
    if(empty($_COOKIE["USER"])){
      header ("Location: ../php/index.php");
    }else{
      setcookie('USER', $_COOKIE["USER"], time()+600);
    }
    if(isset($_COOKIE["USER"])){
        $usuario= $_COOKIE["USER"];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" dir="ltr">
    <title>PlantaSou</title>

   
    <link rel="shortcut icon" href="../imgs/logo_new.ico">

</head>
<body>
    <div class="navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <div class="media">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <a class="navbar-brand plantasou" href="#">
                            <img src="../imgs/logo_new.jpeg" class="align-self-center mr-3 rounded float-right" width="50" height="50" alt="...">
                            PlantaSou
                        </a>
                    
                        <ul class="navbar-nav nav-pills nav-link-color me-auto mb-2 mb-lg-0">
                        <?php
                            if(isset($_COOKIE["USER"])){
                                echo'
                                <li class="nav-item">
                                    <a class="nav-link nav-link-color" href="../php/home_user.php">Home</a>
                                </li>
                                ';
                            }else if(isset($_COOKIE["ADM"])){
                                echo'
                                <li class="nav-item">
                                    <a class="nav-link nav-link-color" href="../php/home_adm.php">Home</a>
                                </li>
                                ';
                            }else{
                                echo'
                                <a class="nav-link nav-link-color" href="../php/index.php">Home</a>
                                ';
                            }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link nav-link-color" href="../php/produtos.php">Produtos</a>
                        </li>
                        <?php
                            if(isset($_COOKIE["USER"])){
                                echo'
                                <li class="nav-item">
                                    <a class="nav-link nav-link-color active" aria-current="page" href="#">💲 Orçamento</a>
                                </li>
                                ';
                            }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link nav-link-color" href="../php/cultivo.php">Cultivo</a>
                        </li>
                        <?php
                            if(isset($_COOKIE["USER"])){
                                echo'
                                <li class="nav-item">
                                    <a class="nav-link nav-link-color" href="../php/historico.php">Histórico</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-link-color" href="./logout_user.php">Sair</a>
                                </li>
                                ';
                            }else if(isset($_COOKIE["ADM"])){
                                echo'
                                <li class="nav-item">
                                <a class="nav-link nav-link-color" href="./logout_adm.php">Sair</a>
                                </li>
                                ';
                            }else{
                                echo'
                                <li class="nav-item">
                                    <button type="button" class="btn nav-link nav-link-color" data-bs-toggle="modal" data-bs-target="#login">
                                        Login
                                    </button>
                                </li>
                                ';
                            }
                            if(isset($_COOKIE["USER"]) || isset($_COOKIE["ADM"])){
                                echo'
                                    <li class="nav-item">
                                        <a class="nav-link nav-link-color active_usuario">Seja bem-vindo(a) ';

                                            if(isset($_COOKIE["USER"])){
                                                include('../inc/conexao.php');
                                                $sql="SELECT nome FROM usuario WHERE cod_usuario=$usuario";
                                                $query=mysqli_query($con, $sql);
                                                
                                                if(mysqli_num_rows($query)>0){
                                                    while(($nome=mysqli_fetch_assoc($query))!=NULL){
                                                        echo $nome['nome'];
                                                    }
                                                } 
                                            }
                                            elseif(isset($_COOKIE["ADM"])){
                                                echo "Administrador(a)";
                                            }
                                echo'
                                        </a>
                                    </li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
<?php
    session_start();

    if(!isset($_SESSION['itens'])){
        $_SESSION['itens']= array();
    }

    if(isset($_GET['add']) && $_GET['add'] == "tabela"){
        $idProduto = $_GET['id'];
        if(!isset($_SESSION['itens'][$idProduto])){
            $_SESSION['itens'][$idProduto] = 1;
        }else{
            $_SESSION['itens'][$idProduto] += 1;
        }
    }

    if(count($_SESSION['itens'])== 0){
        echo'
                <div class="p-5 text-center">
                    <div class="alert font">
                        <div class="text-black">
                            <p>Nenhum produto foi selecionado</p>
                            </br>
                            <p><a class="link" href="../php/produtos.php">Você poderá selecionar um produto na página Produtos</a></p>
                        </div>
                    </div>
                </div>
        ';
    }else{
        include ("../inc/conexao.php");

        echo'
            <table class="table table-borderless tabela w-75 p-3">
                <thead>
                    <tr class="centro">
                        <th colspan="2">Quantidade</th>
                        <th>Nome do produto</th>
                        <th>Preço unitário</th>
                        <th>Preço total</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>';

        foreach($_SESSION['itens'] as $idProduto => $quantidade){
            /*$sql= $con->prepare("SELECT * FROM produto WHERE cod_produto=?");
            $sql->bind_param("i", $idProduto);
            $sql->execute();*/
            $sql="SELECT * FROM produto WHERE cod_produto=$idProduto";
            $query=mysqli_query($con, $sql);

                while(($seleciona=mysqli_fetch_assoc($query))!= NULL){
                    
                    include "../inc/mudar_quantidade.php";

                    if(isset($_POST['qtd_recebida'])){
                        $quantidade= $_POST['quantidade_nova'];
                    }
                   
                    $preco_total= $seleciona['preco']* $quantidade;

                    echo'
                        <tr class="centro">
                            <td>
                                <button type="button" class="btn nav-link nav-link-color btn-color" data-bs-toggle="modal" data-bs-target="#quantidade_p'.$idProduto.'">
                                    Modificar
                                </button>
                            </td>
                            <th scope="row">
                                <input type="number" class="centro" value="'.$quantidade.'" id="qtd"/>
                            </th>
                            <td>'.$seleciona['nome'].'</td>
                            <td>R$'.$seleciona['preco'].'</td>
                            <input type= "hidden" value="'.$seleciona['preco'].'" id="preco"/>
                            <td><input type="number" class="centro" id="total" value="'.$preco_total.'"/></td>
                            <td>
                                <button class="btn btn-color" type="button" id="dropdownMenuButton1" aria-expanded="false">
                                    <a class="btn-color" href="remover_produto.php?remover=tabela&id='.$idProduto.'">Remover</a>
                                </button>
                            </td>
                        </tr>    
                        ';
                }
            
        }
        echo'
                </tbody>
            </table>';
        
    }
?>
<?php
    include "./login.php";
    include "./cadastro_produto.php";
?>
<script src="../js/quantidade.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="../css/estilo.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/5.0.1/css/bootstrap.min.css">

</body>
</html>
