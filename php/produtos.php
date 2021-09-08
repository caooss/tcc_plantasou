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
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../imgs/logo_new.ico">

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
                        <a class="nav-link nav-link-color active" aria-current="page" href="#"><img src="../imgs/tomates.png" width="20" height="20"/> Produtos</a>
                        <?php
                            if(isset($_COOKIE["USER"])){
                                echo'
                                    <a class="nav-link nav-link-color" href="../php/orcamento.php">Orçamento</a>
                                ';
                            }
                        ?>
                            <a class="nav-link nav-link-color" href="../php/cultivo.php">Cultivos</a>
                        <?php
                            if(isset($_COOKIE["USER"])){
                                echo'
                                    <a class="nav-link nav-link-color" href="../php/historico.php">Histórico</a>
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
                            <button class="btn btn-outline-success nav-link-color borda" type="submit">Buscar</button>
                        </form>
            </div>
        </nav>

        <?php
            if(isset($_COOKIE["USER"]) || isset($_COOKIE["ADM"])){
                echo'
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
                        </a>';
            }
            else{
                echo'
                <center>
                    <a class="nav-link nav-link-color active_usuario ">Seja bem-vindo(a) ao site </a>
                </center>
                ';
            }
        ?>

    <br>
    <h1 class="centro paginas">Produtos</h1>

    <?php
        if(isset($_COOKIE["ADM"])){
            echo'
                <div class="p-5 text-center">
                    <div class="alert font">
                        <div class="text-black d-grid gap-2">
                            <button type="button" class="btn adicionar" data-bs-toggle="modal" data-bs-target="#cadastro_produto">
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

            echo'
            <center>
                <table>
            ';

            if(mysqli_num_rows($query)>0){
                while(($resultado=mysqli_fetch_assoc($query))!=NULL){
                    if($resultado["cod_produto"] % 2 == 1){
                        echo'<tr>
                            <td>';    
                    }
                    echo 
                    '
                    <td></td>
                    <td></td>
                    <td>
                        <div class="card mb-5 tamanho2 text-center">
                            <div class="font">
                                <img src="../imgs/plantas/'.$resultado["imagem"].'" width="448px" height="250px"/>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <b class="letra">
                                            '.$resultado["nome"].'<br><br>
                                        </b>
                                    </h5>
                                    <p class="card-text">
                                        <ul>
                                            <li>'.$resultado["vitaminas"].'</li>
                                            <li>'.$resultado["beneficios"].'</li>
                                        </ul>
                                    </p>
                                    <b class="font-money">R$ '.number_format($resultado["preco"],2).'/1g
                                </div>
                            </div>
                        </div>';
                        if(isset($_COOKIE["USER"])){
                            echo '
                            <div class="posicao"> 
                                <table>
                                    <td>
                                        <form action="orcamento.php" method="POST">
                                            <button type="submit" name="selecionar" class="font btn button-margin btn-outline-dark"><a href="orcamento.php?add=tabela&id='.$resultado['cod_produto'].'" class="altera">Selecionar</a></button>
                                        </form>
                                    </td>
                                </table>
                            <div>  
                                ';
                            }
                            elseif(isset($_COOKIE["ADM"])){
                                $produto=$resultado["cod_produto"];
                                echo'
                                <center>
                                    <table class="posicao_bot">
                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-color btn-outline-dark" data-bs-toggle="modal" data-bs-target="#produto_editar'.$produto.'">Editar</button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-color btn-outline-dark" aria-expanded="false" href="remover_produto.php?id='.$resultado['cod_produto'].'">Remover</button>
                                        </td>
                                    </tr>
                                    </table>
                                </center>
                                    ';
                            }
                }

                echo'
                    </td>
                </tr>
                </table>
                </center>';
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