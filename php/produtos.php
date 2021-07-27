<?php
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
                            <a class="nav-link nav-link-color active" aria-current="page" href="#"><img src="../imgs/tomates.png" width="20" height="20"/> Produtos</a>
                        </li>
                        <?php
                            if(isset($_COOKIE["USER"])){
                                echo'
                                <li class="nav-item">
                                    <a class="nav-link nav-link-color" href="../php/orcamento.php">Orçamento</a>
                                </li>
                                ';
                            }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link nav-link-color" href="../php/cultivo.php">Cultivos</a>
                        </li>
                        <?php
                            if(isset($_COOKIE["USER"])){
                                echo'
                                <li class="nav-item">
                                    <a class="nav-link nav-link-color" href="../php/historico.php">Histórico</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-link-color" href="./logout_user.php"><img src="../imgs/out.png" width="15" height="15"/> Sair</a>
                                </li>
                                ';
                            }else if(isset($_COOKIE["ADM"])){
                                echo'
                                <li class="nav-item">
                                    <a class="nav-link nav-link-color" href="./logout_adm.php"><img src="../imgs/out.png" width="15" height="15"/> Sair</a>
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
                                                echo "Administrador(a)⠀⠀⠀⠀⠀⠀⠀⠀⠀";
                                            }
                                echo'
                                        </a>
                                    </li>';
                            }
                            else{
                                echo'
                                <li>
                                <a class="nav-link nav-link-color active_usuario ">Seja bem-vindo(a) ao site ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀</a>
                                </li>';
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

    <br>
    <h1 class="centro">Produtos</h1>

    <?php
        if(isset($_COOKIE["ADM"])){
            echo'
                <div class="p-5 text-center">
                    <div class="alert font">
                        <div class="text-black d-grid gap-2">
                            <button type="button" class="btn nav-link nav-link-color adicionar" data-bs-toggle="modal" data-bs-target="#cadastro_produto">
                                Adicionar
                            </button>   
                        </div>
                    </div>
                </div>
            ';
        }
    ?>

    <form action="orcamento.php" method="post">
        <?php
            include("../inc/conexao.php");

            $sql="SELECT * FROM produto";

            $query=mysqli_query($con, $sql);

            if(mysqli_num_rows($query)>0){
                while(($resultado=mysqli_fetch_assoc($query))!=NULL){
                    echo 
                    '
                    <div class="p-5 text-center">
                        <div class="alert font">
                            <div class="text-black">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            <img src="../imgs/plantas/'.$resultado["imagem"].'" class="img-margin" width="190" height="190"/>
                                        </td>

                                        <td class="plantas_desc text-black">
                                            <b class="font-money">
                                            '.$resultado["nome"].'<br><br>
                                            </b>
                                            <ul>
                                                <li>'.$resultado["vitaminas"].'</li>
                                                <li>'.$resultado["beneficios"].'</li>
                                            </ul>
                                            <br>
                                            <b class="font-money">R$ '.number_format($resultado["preco"],2).'/1g';
                                            
                                            if(isset($_COOKIE["USER"])){
                                                echo ' <form action="orcamento.php" method="POST">
                                                            <button type="submit" name="selecionar" class="font btn btn-color button-margin cor"><a href="orcamento.php?add=tabela&id='.$resultado['cod_produto'].'" class="altera">Selecionar</a></button>
                                                        </form>
                                                        ';
                                                }
                                            elseif(isset($_COOKIE["ADM"])){
                                                $produto=$resultado["cod_produto"];
                                                /**/
                                                echo'
                                                    <button type="button" class="btn nav-link nav-link-color btn-color" data-bs-toggle="modal" data-bs-target="#produto_editar'.$produto.'">
                                                        Editar
                                                    </button>
                                                    <button class="btn btn-color" type="button" aria-expanded="false">
                                                        <a class="btn-color" href="remover_produto.php?id='.$resultado['cod_produto'].'">Remover</a>
                                                    </button>
                                                ';
                                            }
                                            echo'
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    ';
                }
            }else{
                echo mysqli_error($con);
            }
            include("../inc/disconnect.php");
        ?>
    </form>

    <?php
        include "./editar_produto.php";
        
        include "./cadastro_produto.php";
        include "./login.php";
    ?>
</body>
</html>