<?php
    session_start();
    if(isset($_COOKIE["USER"])){
        $usuario= $_COOKIE["USER"];
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>PlantaSou</title>
        <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/estilo.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
        <link rel="shortcut icon" href="../imgs/logo_new.ico">
        <script src="../js/teste.js"></script>
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
                                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-bs-haspopup="true" aria-bs-expanded="false">
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
                                <a class="nav-link nav-link-color active" aria-current="page" href="../php/produtos.php"><img src="../imgs/tomates.png" width="20" height="20"/> Produtos</a>
                            ';
                          }
                        ?>
                        <?php
                            if(isset($_COOKIE["USER"])){
                                echo'
                                    <a class="nav-link nav-link-color" href="../php/orcamento.php">Or??amento</a>
                                ';
                            }
                        ?>
                        <?php
                            if(isset($_COOKIE["ADM"])){
                            echo'
                                <div class="nav-link dropdown show">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-bs-haspopup="true" aria-bs-expanded="false">
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
                                <a class="nav-link nav-link-color" aria-current="page" href="../php/cultivo.php">Cultivos</a>
                            ';
                            }
                        ?>
                        <?php
                            if(isset($_COOKIE["USER"])){
                                echo'
                                    <a class="nav-link nav-link-color" href="../php/historico.php?num=0">Hist??rico</a>
                                    <div class="nav-link dropdown show">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-bs-haspopup="true" aria-bs-expanded="false">
                                            <img src="../imgs/engrenagem.png" width="20" height="20"/> A????es
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="../php/alterar_dados.php">Alterar dados</a>
                                            <a class="dropdown-item" href="./logout_user.php"><img src="../imgs/out.png" width="15" height="15"/> Sair</a>
                                        </div>
                                    </div>
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
                        <form action="#" class="d-flex" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Pesquisar..." aria-label="Search" name="pesquisa"/>
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

    <?php
        $pesquisa=$_POST["pesquisa"];
        echo'<h1 class="centro paginas">Resultado encontrado a partir de: '.$pesquisa.'</h1><br>';

        echo '
        <center>
            ??????<a class="nav-link-color font" href="../php/produtos.php">VER TODOS</a>??????<br><br><br>
        </center>
        ';

        include "../inc/conexao_pdo.php";

        $stmt=$conPDO->query("SELECT * FROM produto WHERE nome LIKE '%$pesquisa%' ORDER BY nome asc");
        $stmt->execute();

        echo'
            <center>
                <table>
            ';
        
        $i=1;
        
        if($stmt->rowCount()!=NULL){
            while($resultado=$stmt->fetch(PDO::FETCH_OBJ)){
                if($i % 2 == 1){
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
                            <img src="../imgs/plantas/'.$resultado->imagem.'" width="448px" height="250px"/>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <b class="letra">
                                        '.$resultado->nome.'<br><br>
                                    </b>
                                </h5>
                                <p class="card-text">
                                    <ul>
                                        <li>'.$resultado->vitaminas.'</li>
                                        <li>'.$resultado->beneficios.'</li>
                                    </ul>
                                </p>
                                <b class="font-money">R$ '.number_format($resultado->preco,2).'/100g
                            </div>
                        </div>
                    </div>';
                    if(isset($_COOKIE["USER"])){
                        echo '
                        <div class="posicao"> 
                            <table>
                                <td>
                                    <form action="orcamento.php" method="POST">
                                        <button type="submit" name="selecionar" class="font btn button-margin btn-outline-dark"><a href="orcamento.php?add=tabela&id='.$resultado->cod_produto.'" class="altera">Selecionar</a></button>
                                    </form>
                                </td>
                            </table>
                        <div>  
                            ';
                        }
                        elseif(isset($_COOKIE["ADM"])){
                            $produto=$resultado->cod_produto;
                            echo'
                            <center>
                                <table class="posicao_bot">
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-color btn-outline-dark" aria-expanded="false"><a href="editar_produto.php?cod='.$produto.'" class="altera">Editar</a></button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-color btn-outline-dark" aria-expanded="false"><a onclick="confirmacao_p('.$resultado->cod_produto.')">Remover</a></button>
                                    </td>
                                </tr>
                                </table>
                            </center>
                                ';
                        }
                $i++;
            }
        }else{
            echo '
                <br><br><br>
                <h1 class="centro paginas">Nenhum produto foi encontrado</h1>
            ';
        }

        echo'
            </td>
        </tr>
        </table>
        </center>';
    ?>

    <?php
        include "./login.php";
    ?>

    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>

</body>
</html>