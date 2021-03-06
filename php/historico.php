<?php
    if(empty($_COOKIE["USER"])){
      header ("Location: ../php/index.php");
    }else{
      setcookie('USER', $_COOKIE["USER"], time()+3600);
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

    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/estilo.css">
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
                        <div class="nav-link dropdown show">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-bs-haspopup="true" aria-bs-expanded="false">
                                <img src="../imgs/engrenagem.png" width="20" height="20"/> Ações
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

    <form action="pesquisa_h.php" enctype="multipart/form-data" method="POST" class="centro">
        <input type="month" name="mes"/>
        <input type="submit" value="Buscar"/>
    </form>

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

                $sql="INSERT INTO historico (cod_usuario, cod_produto, quantidade_produto, data_, cod_tabela) 
                    VALUES ($cod_usuario, $cod_produto, $quantidade_produto, '$data_', $cod_tabelaInc)";

                $query=mysqli_query($con, $sql);
                
            }
            unset($_SESSION['dados']);
        }

        include("../inc/conexao_pdo.php");

        $stmt=$conPDO->query("SELECT cod_tabela FROM historico GROUP BY cod_tabela");
        $number=$stmt->rowCount();

        $user=$conPDO->query("SELECT cod_usuario FROM historico WHERE cod_usuario=$usuario");
        $n=$user->rowCount();

        if($n==0){
            echo'
                <div class="p-5 text-center">
                    <div class="alert fundoo font">
                        <div class="text-black">
                            <p>Nenhum Orçamento foi salvo!</p>
                            </br>
                            <p><a class="fundoo2" href="../php/orcamento.php">Você poderá salvar um orçamento na página Orçamento</a></p>
                        </div>
                    </div>
                </div>';
        }

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
                            <td><b>Editar</b></td>
                        </tr>
                    </thead>
                ';
                while(($historico_user=mysqli_fetch_assoc($query))!=NULL){
                    $total = $historico_user["preco"]*$historico_user["quantidade_produto"];
                    echo '
                        <tbody>
                            <tr class="centro">
                                <td>'.$historico_user["quantidade_produto"].'</td>
                                <td>'.$historico_user["nome"].'</td>
                                <td>'.number_format($historico_user["preco"],2).'</td>
                                <td>'.number_format($total,2).'</td>
                                <td>'.$historico_user["data_"].'</td>
                                <td>
                                    <button type="button" class="btn btn-color btn-outline-dark" aria-expanded="false">
                                        <a onclick="confirmacao_ph('.$historico_user['cod_produto'].', '.$historico_user['cod_tabela'].')">Excluir</a>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        
                    
                    ';
                    $preco_final+=$total;
                    $idTabela=$historico_user["cod_tabela"];
                }
            echo'
                    <tfoot>
                        <tr class="centro font">
                            <th colspan="5">Total: R$ '.number_format($preco_final,2).'</th>
                            <td>
                                <button class="btn btn-outline-dark collapsed" type="button" aria-expanded="false">
                                    <a onclick="confirmacao_h('.$idTabela.')">Remover Tabela</a>
                                </button>
                            </td>
                        </tr>
                    </tfoot>
                </table>';
            }
            echo '<br><br>';
        }

    ?>

    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/teste.js"></script>

<?php
    /*include "./login.php";
    include "./cadastro_produto.php";*/
?>


</body>
</html>

