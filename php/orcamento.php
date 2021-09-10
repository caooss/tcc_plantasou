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
                                    <a class="nav-link nav-link-color active" aria-current="page" href="#"><img src="../imgs/moeda.png" width="20" height="20"/> Orçamento</a>
                                ';
                            }
                        ?>
                            <a class="nav-link nav-link-color" href="../php/cultivo.php">Cultivos</a>
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
    <h1 class="centro">Orçamento</h1>

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
                    <div class="alert fundoo font">
                        <div class="text-black">
                            <p>Nenhum produto foi selecionado!</p>
                            </br>
                            <p><a class="fundoo2" href="../php/produtos.php">Você poderá selecionar um produto na página Produtos</a></p>
                        </div>
                    </div>
                </div>
        ';
    }else{
        include ("../inc/conexao.php");

        echo'
            <table class="table-sm tabela w-75 p-3 table-bordered border-dark" cellspacing="0" rules="none">
                <thead>
                    <tr class="centro">
                        <td colspan="2"><b>Quantidade</b></td>
                        <td><b>Nome do produto</b></td>
                        <td><b>Preço unitário</b></td>
                        <td><b>Preço total</b></td>
                        <td><b>Editar</b></td>
                    </tr>
                </thead>
                <tbody>';

        $preco_final=0;

        $_SESSION['dados']=array();

        foreach($_SESSION['itens'] as $idProduto => $quantidade){
            /*$sql= $con->prepare("SELECT * FROM produto WHERE cod_produto=?");
            $sql->bind_param("i", $idProduto);
            $sql->execute();*/
            $sql="SELECT * FROM produto WHERE cod_produto=$idProduto";
            $query=mysqli_query($con, $sql);

            $mudar= 0;
                while(($seleciona=mysqli_fetch_assoc($query))!= NULL){
                    
                    include "../inc/mudar_quantidade.php";
                    
                    if(isset($_POST['qtd_recebida'])){
                        $mudar= $_POST['quantidade_nova'];
                    }

                    if(($mudar!= 0) && ($idProduto == $_POST['id_recebido'])){
                        $_SESSION['qtd'][$idProduto]= $mudar;
                        $_SESSION['itens'][$idProduto]= $mudar;
                        /*$quantidade= $mudar;*/
                        $_SESSION['preco_total'][$idProduto]=$seleciona['preco']* $_SESSION['qtd'][$idProduto];
                        echo'
                        <tr class="centro">
                            <td>
                                <button type="button" class="btn cor_bot btn-outline-dark collapsed" data-bs-toggle="modal" data-bs-target="#quantidade_p'.$idProduto.'">
                                    Mudar quantidade
                                </button>
                            </td>
                            <td scope="row">
                                '.$_SESSION['qtd'][$idProduto].'
                            </td>
                            <td>'.$seleciona['nome'].'</td>
                            <td>R$ '.number_format($seleciona['preco'],2).'</td>
                            <input type= "hidden" value="'.number_format($seleciona['preco'],2).'" id="preco"/>
                            <td>R$ '.number_format($_SESSION['preco_total'][$idProduto],2).'</td>
                            <td>
                                <button class="btn btn-color" type="button" aria-expanded="false">
                                    <a class="btn-color" href="remover_orcamento.php?remover=tabela&id='.$idProduto.'">Remover</a>
                                </button>
                            </td>
                        </tr>    
                        ';
                    }else{
                        $_SESSION['qtd'][$idProduto]= $quantidade;
                        $_SESSION['preco_total'][$idProduto]=$seleciona['preco']* $_SESSION['qtd'][$idProduto];

                        echo'
                            <tr class="centro">
                                <td>
                                    <button type="button" class="btn cor_bot btn-outline-dark collapsed" data-bs-toggle="modal" data-bs-target="#quantidade_p'.$idProduto.'">
                                        Mudar quantidade
                                    </button>
                                </td>
                                <td scope="row"">
                                    '.$_SESSION['qtd'][$idProduto].'
                                </td>
                                <td>'.$seleciona['nome'].'</td>
                                <td>R$ '.number_format($seleciona['preco'],2).'</td>
                                <input type= "hidden" value="'.number_format($seleciona['preco'],2).'" id="preco"/>
                                <td>R$ '.number_format($_SESSION['preco_total'][$idProduto],2).'</td>
                                <td>
                                    <button class="btn btn-outline-dark collapsed" type="button" id="dropdownMenuButton1" aria-expanded="false">
                                        <a class="btn-outline-dark collapsed" href="remover_orcamento.php?remover=tabela&id='.$idProduto.'">Remover</a>
                                    </button>
                                </td>
                            </tr>    
                            ';
                    }
                   
                   $preco_final+=$_SESSION['preco_total'][$idProduto];
                }

                array_push($_SESSION['dados'],
                array(
                    'usuario' => $usuario,
                    'id_produto' => $idProduto,
                    'quantidade' => $_SESSION['qtd'][$idProduto],
                    'data' => date("d-m-Y"),
                    'total' => $_SESSION['preco_total'][$idProduto]
                )
                );//array_push
        }
        echo'
                    <tr class="centro font">
                        <td colspan="5"><b>Total: R$ '.number_format($preco_final,2).'</b></td>
                        <td colspan="6">
                            <a href="../php/excluir_orcamento.php">Excluir Tabela</a> │ 
                            <a href="../php/historico.php?num=1">Salvar</a>
                        </td>
                    </tr>
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
