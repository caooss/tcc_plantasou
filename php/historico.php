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
                <a class="nav-link nav-link-color" href="../php/produtos.php">Produtos</a>
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
                        <a class="nav-link nav-link-color active" aria-current="page" href="#"><img src="../imgs/livro.png" width="20" height="20"/> Histórico</a>
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
    ?>

    <br>
    <h1 class="centro letra">Histórico</h1>

    <?php
        session_start();
        include("../inc/conexao.php");

        $num=0;
        $num=$_GET['num'];

        if((isset($_SESSION['dados'])) && $num==1){

            $sqlMax="SELECT MAX(cod_tabela) FROM historico";
                $queryMax=mysqli_query($con, $sqlMax);

                if(mysqli_num_rows($queryMax)>0){
                    while(($max=mysqli_fetch_assoc($queryMax))!=NULL){
                        $cod_tabelaInc=$max['MAX(cod_tabela)']+1;
                    }
                }

            foreach($_SESSION['dados'] as $historico){
                $cod_usuario=$historico['usuario'];
                $cod_produto=$historico['id_produto'];
                $quantidade_produto=$historico['quantidade'];
                $data_=$historico['data'];
                $total=$historico['total'];

                intval($cod_usuario);
                intval($quantidade_produto);

                $sql="INSERT INTO historico (cod_usuario, cod_produto, quantidade_produto, data_, total, cod_tabela) 
                    VALUES ($cod_usuario, $cod_produto, $quantidade_produto, '$data_', $total, $cod_tabelaInc)";

                $query=mysqli_query($con, $sql);
                
            }
            unset($_SESSION['dados']);
        }

        include("../inc/conexao_pdo.php");

        $stmt=$conPDO->query("SELECT cod_tabela FROM historico GROUP BY cod_tabela");
        $number=$stmt->rowCount();



        for ($i=1; $i <= $number; $i++) { 

            $sql="SELECT * FROM historico h INNER JOIN produto p ON h.cod_produto=p.cod_produto WHERE cod_usuario=$usuario AND cod_tabela=$i";
            $query=mysqli_query($con, $sql);

            $preco_final=0;
            if(mysqli_num_rows($query)>0){
                echo'
                <table class=" fonte_ table-sm tabela w-75 p-3 table-bordered border-dark" cellspacing="0" rules="none">
                    <thead>
                        <tr class="centro">
                            <td><b>Quantidade</b></td>
                            <td><b>Nome do produto</b></td>
                            <td><b>Preço unitário</b></td>
                            <td><b>Preço total</b></td>
                            <td><b>Data</b></td>
                        </tr>
                    </thead>
                ';
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
                    $idTabela=$historico_user["cod_tabela"];
            }
            echo'
                    <tfoot>
                        <tr class="centro font">
                            <th colspan="4">Total: R$ '.number_format($preco_final,2).'</th>
                            <td>
                                <button class="btn btn-outline-dark collapsed" type="button" aria-expanded="false">
                                    <a class="btn-outline-dark collapsed" href="remover_historico.php?id='.$idTabela.'">Remover</a>
                                </button>
                            </td>
                        </tr>
                    </tfoot>
                </table>';
            }
            echo '<br><br>';
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
