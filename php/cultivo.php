<?php
    session_start();
    if(isset($_COOKIE["USER"])){
        $usuario= $_COOKIE["USER"];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" dir="ltr">
    <title>PlantaSou</title>

    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/teste.css">
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../imgs/logo_new.ico">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    

</head>
<body>
    <nav class="navbar navbar-light bg-light topnav">
        <div class="container-fluid">
            <a class="navbar-brand plantasou">
                <p class="plantasou">
                    <img src="../imgs/logo_new.png" class="align-self-center mr-3 rounded float-left" width="50" height="50" alt="..."></img>
                    PlantaSou
                </p>
            </a>
        <?php
            if(isset($_COOKIE["USER"])){
                echo'
                    <a class="nav-link nav-link-color" href="../php/home_user.php">Home</a>
                ';
            }else if(isset($_COOKIE["ADM"])){
                echo'
                    <a class="nav-link nav-link-color" href="../php/home_adm.php">Home</a>
                ';
            }else{
                echo'
                <a class="nav-link nav-link-color" href="../php/index.php">Home</a>
                ';
            }
        ?>
        <?php
            if(isset($_COOKIE["ADM"])){
            echo'
                <div class="nav-link dropdown show">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-bs-haspopup="true" aria-bs-expanded="false">
                        <img src="../imgs/tomates.png" width="20" height="20"/> Produtos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../php/produtos.php">Produtos</a>
                        <a class="dropdown-item" href="../php/cadastro_produto.php">Cadastro Produto</a>
                    </div>
                </div>
            ';
            }else{
            echo'
                <a class="nav-link nav-link-color" aria-current="page" href="../php/produtos.php">Produtos</a>
            ';
            }
        ?>
        <?php
            if(isset($_COOKIE["USER"])){
                echo'
                    <a class="nav-link nav-link-color" href="../php/orcamento.php">Orçamento</a>
                ';
            }
        ?>
        <?php
            if(isset($_COOKIE["ADM"])){
            echo'
                <div class="nav-link dropdown show">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-bs-haspopup="true" aria-bs-expanded="false">
                    <img src="../imgs/crescer-planta.png" width="20" height="20"/> Cultivos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../php/cultivo.php">Cultivos</a>
                        <a class="dropdown-item" href="../php/cadastro_cultivo.php">Cadastro Cultivos</a>
                    </div>
                </div>
            ';
            }else{
            echo'
                <a class="nav-link nav-link-color active" aria-current="page" href="#"><img src="../imgs/crescer-planta.png" width="20" height="20"/> Cultivos</a>
            ';
            }
        ?>
        <?php
            if(isset($_COOKIE["USER"])){
                echo'
                    <a class="nav-link nav-link-color" href="../php/historico.php?num=0">Histórico</a>
                    <a class="nav-link nav-link-color" href="./logout_user.php"><img src="../imgs/out.png" width="15" height="15"/> Sair</a>
                ';
            }else if(isset($_COOKIE["ADM"])){
                echo'
                    <a class="nav-link nav-link-color" href="./logout_adm.php"><img src="../imgs/out.png" width="15" height="15"/> Sair</a>
                ';
            }else{
                echo'
                    <button type="button" class="btn nav-link nav-link-color" data-bs-toggle="modal" data-bs-target="#login">
                        Login
                    </button>
                ';
            }
        ?>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Pesquisar..." aria-label="Search"/>
            <button class="btn btn-outline-success borda" type="submit">Buscar</button>
        </form>
        </div>
    </nav>
    <?php
        if(isset($_COOKIE["USER"]) || isset($_COOKIE["ADM"])){
                    echo'
                        <a class="nav-link nav-link-color active_usuario ">Seja bem-vindo(a) ';

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
                        </a>';
                }
                else{
                    echo'
                    <a class="nav-link nav-link-color active_usuario ">Seja bem-vindo(a) ao site </a>';
                }
    ?>

    <br>
    <h1 class="centro paginas">Cultivo</h1>

    <?php
        if(isset($_COOKIE["ADM"])){
            echo'
                
            ';

            /*<div class="p-5 text-center">
                    <div class="alert font">
                        <div class="text-black d-grid gap-2">
                            <button type="button" class="btn adicionar" data-bs-toggle="modal" data-bs-target="#cadastro_cultivo">
                                Adicionar
                            </button>   
                        </div>
                    </div>
                </div>*/
        }
    ?>


    <?php
        include("../inc/conexao.php");

        $bda = "SELECT * FROM cultivo";
        $sql = "SELECT * FROM cultivo"; 

        $quer=mysqli_query($con, $bda);
        $query=mysqli_query($con, $sql);
        
        echo'
            <center>
            <div class="container">
            ';

        if(mysqli_num_rows($quer)>0){
            while(($resultado=mysqli_fetch_assoc($quer))!=NULL){
                echo 
                '
                <center>
                <div class="row">
                    <div class="col">
                        <div class="posicao_nome"><h4 class="letra">'.$resultado["nome"].'</h4></div>
                        <p class="posicao_imagem">
                            <img src="../imgs/plantas/'.$resultado["src"].'" class="rounded float-start mb-3" width="450px" height="250px"></img>
                        </p>
                    </div>
                    <div class="col">
                            <p>
                            <div style="width: 450px;" class="posicao_botao">
                                    <div id="'.$resultado["nome_php"].'meugrupo">
                                        <button type="button" class="btn btn-outline-dark collapsed" data-toggle="collapse" data-target="#'.$resultado["nome_php"].'clima" aria-expanded="false" aria-controls="'.$resultado["nome_php"].'clima">Clima</button>
                                        <button type="button" class="btn btn-outline-dark collapsed" data-toggle="collapse" data-target="#'.$resultado["nome_php"].'plantio" aria-expanded="false" aria-controls="'.$resultado["nome_php"].'plantio">Plantio</button>
                                        <button type="button" class="btn btn-outline-dark collapsed" data-toggle="collapse" data-target="#'.$resultado["nome_php"].'luminosidade" aria-expanded="false" aria-controls="'.$resultado["nome_php"].'luminosidade">Luminosidade</button>
                                        <button type="button" class="btn btn-outline-dark collapsed" data-toggle="collapse" data-target="#'.$resultado["nome_php"].'irrigacao" aria-expanded="false" aria-controls="'.$resultado["nome_php"].'irrigacao">Irrigação</button>                                   
                                        <button type="button" class="btn btn-outline-dark collapsed" data-toggle="collapse" data-target="#'.$resultado["nome_php"].'tempo" aria-expanded="false" aria-controls="'.$resultado["nome_php"].'tempo">Tempo</button>              
                                        <div class="collapse show" id="'.$resultado["nome_php"].'clima" data-parent="#'.$resultado["nome_php"].'meugrupo">
                                            <p><div class="card card-body" style="width: 450px;">
                                                <p>'.$resultado["clima"].'</p>
                                            </div></p>
                                        </div>
                                        <div class="collapse" id="'.$resultado["nome_php"].'plantio" data-parent="#'.$resultado["nome_php"].'meugrupo">
                                            <p><div class="card card-body" style="width: 450px;">
                                                <p>'.$resultado["plantio"].'</p>
                                            </div></p>
                                        </div>
                                        <div class="collapse" id="'.$resultado["nome_php"].'luminosidade" data-parent="#'.$resultado["nome_php"].'meugrupo">
                                            <p><div class="card card-body" style="width: 450px;">
                                                <p>'.$resultado["luminosidade"].'</p>
                                            </div></p>
                                        </div>
                                        <div class="collapse" id="'.$resultado["nome_php"].'irrigacao" data-parent="#'.$resultado["nome_php"].'meugrupo">
                                            <p><div class="card card-body" style="width: 450px;">
                                                <p>'.$resultado["irrigacao"].'</p>
                                            </div></p>
                                        </div> 
                                        <div class="collapse" id="'.$resultado["nome_php"].'tempo" data-parent="#'.$resultado["nome_php"].'meugrupo">
                                            <p><div class="card card-body" style="width: 450px;">
                                                <p>'.$resultado["temp_colheita"].'</p>
                                            </div></p>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                                if(isset($_COOKIE["ADM"])){
                                    $cod_cultivo=$resultado['cod_cultivo'];
                                    echo ' 
                                    <table>
                                        <tr>
                                        <td>
                                            <button type="button" class="btn btn-color btn-outline-dark direcao_b" data-bs-toggle="modal" data-bs-target="#cultivo_editar'.$cod_cultivo.'">
                                                Editar
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-color btn-outline-dark direcao_b2" aria-expanded="false">
                                                <a class="btn-color" href="remover_cultivo.php?id='.$cod_cultivo.'">Remover</a>
                                            </button>
                                        </td>
                                    <tr>
                                    </table>';
                                }
                            echo'
                            </p>
                        </center>';
            }
            
        }else{
            echo mysqli_error($con);
        }
        echo'
                    </div>
                </div>
                </div>
                </center>
                ';
        include("../inc/disconnect.php");
    ?>
    <?php
        include "./login.php";
        include "./editar_cultivo.php";
        /*include "./cadastro_cultivo.php";*/
    ?>
    <script src="../js/teste.js"></script>
    
</body>
</html>