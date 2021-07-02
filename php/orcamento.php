<?php
    if(empty($_COOKIE["USER"])){
      header ("Location: ../php/index.php");
    }else{
      setcookie('USER', $_COOKIE["USER"], time()+600);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" dir="ltr">
    <title>PlantaSou</title>

    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../imgs/logo_new.ico">

</head>
<body>
    <div class="navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <div class="media">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <a class="navbar-brand plantasou" href="#">
                            <img src="../imgs/logo_new.jpeg" class="align-self-center mr-3 rounded float-right" width="75" height="75" alt="...">
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
                            if(isset($_COOKIE["USER"]) || isset($_COOKIE["ADM"])){
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
                        ?>
                        <li class="margin">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Pesquisar..." aria-label="Search"/>
                                <button class="btn btn-outline-success nav-link-color borda" type="submit">Buscar</button>
                            </form>
                        </li>

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

        foreach($_SESSION['itens'] as $idProduto => $quantidade){
            $sql= $con->prepare("SELECT * FROM produto WHERE cod_produto=?");
            $sql->bind_param("i", $idProduto);
            $sql->execute();
            while(($seleciona=mysqli_fetch_assoc($sql))!= NULL){
                echo
                    $seleciona[0]['nome'].'<br/>.'
                ;
            }
        }
        
    }

?>
<?php
    include "./login.php";
    include "./cadastro_produto.php";
?>
</body>
</html>
