<?php
    if(empty($_COOKIE["USER"])){
      header ("Location: ../php/index.php");
    }else{
      setcookie('USER', $_COOKIE["USER"], time()+1800);
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
                                    <a class="nav-link nav-link-color active" aria-current="page" href="#"><img src="../imgs/livro.png" width="20" height="20"/> Histórico</a>
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

    <br>
    <h1 class="centro">Histórico</h1>

    <?php
        session_start();
        include("../inc/conexao.php");

        if(isset($_SESSION['dados'])){

            echo "<pre>";
            var_dump($_SESSION['dados']);
            echo "</pre>";

            foreach($_SESSION['dados'] as $historico){
                $cod_usuario=$historico['usuario'];
                $cod_produto=$historico['id_produto'];
                $quantidade_produto=$historico['quantidade'];
                $data_=$historico['data'];
                $total=$historico['total'];

                intval($cod_usuario);
                intval($quantidade_produto);

                $sql="INSERT INTO historico (cod_usuario, cod_produto, quantidade_produto, data_, total) 
                    VALUES ($cod_usuario, $cod_produto, $quantidade_produto, '$data_', $total)";

                $query=mysqli_query($con, $sql);

                
            }
            unset($_SESSION['dados']);
        }


        $sql="SELECT * FROM historico h INNER JOIN produto p ON h.cod_produto=p.cod_produto WHERE cod_usuario=$usuario";
        $query=mysqli_query($con, $sql);

        $preco_final=0;
        if(mysqli_num_rows($query)>0){
            echo'
            <table class="table table-borderless tabela w-75 p-3">
                <thead>
                    <tr class="centro">
                        <th>Quantidade</th>
                        <th>Nome do produto</th>
                        <th>Preço unitário</th>
                        <th>Preço total</th>
                        <th>Data</th>
                    </tr>
                </thead>';
            while(($historico_user=mysqli_fetch_assoc($query))!=NULL){
                echo '
                <tbody>
                    <tr class="centro">
                        <td>'.$historico_user["quantidade_produto"].'</td>
                        <td>'.$historico_user["nome"].'</td>
                        <td>'.number_format($historico_user["preco"],2).'</td>
                        <td>'.number_format($historico_user["total"],2).'</td>
                        <td>'.$historico_user["data_"].'</td>
                    </tr>
                </tbody>
                ';
                $preco_final+=$historico_user["total"];
           }
           echo'
           </table>
            <table class="table table-borderless tabela w-75 p-3">
                <tfoot>
                    <tr class="centro font">
                        <th colspan="6">Total: R$ '.number_format($preco_final,2).'</th>
                    </tr>
                </tfoot>
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
