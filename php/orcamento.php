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
                                    <a class="nav-link nav-link-color active" aria-current="page" href="#"><img src="../imgs/moeda.png" width="20" height="20"/> Or??amento</a>
                                ';
                            }
                        ?>
                            <a class="nav-link nav-link-color" href="../php/cultivo.php">Cultivos</a>
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
    <h1 class="centro letra">Or??amento</h1>

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
                            <p><a class="fundoo2" href="../php/produtos.php">Voc?? poder?? selecionar um produto na p??gina Produtos</a></p>
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
                        <td><b>Pre??o unit??rio</b></td>
                        <td><b>Pre??o total</b></td>
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
                                <button class="btn btn-outline-dark collapsed" type="button" id="dropdownMenuButton1" aria-expanded="false">
                                    <a onclick="confirmacao_o('.$idProduto.')">Excluir</a>
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
                                        <a onclick="confirmacao_o('.$idProduto.')">Excluir</a>
                                    </button>
                                </td>
                            </tr>
                </tbody>
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
                <tfoot>
                    <tr class="centro font">
                        <th colspan="5"><b>Total: R$ '.number_format($preco_final,2).'</b></th>
                        <td>
                            <button type="button" class="btn btn-color btn-outline-dark" aria-expanded="false">
                                <a onclick="confirmacao_ot()">Remover Tabela</a>
                            </button>
                            <button type="button" class="btn btn-color btn-outline-dark" aria-expanded="false">
                                <a onclick="salvar_ot()">Salvar Tabela</a>
                            </button>
                        </td>
                    </tr>
                </tfoot>
            </table>';
        
    }
?>

    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/teste.js"></script>

</body>
</html>
