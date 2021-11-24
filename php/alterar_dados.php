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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <a class="nav-link nav-link-color" href="../php/historico.php?num=0">Histórico</a>
                    <div class="nav-link dropdown show">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-bs-haspopup="true" aria-bs-expanded="false">
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
    <?php
        if(empty($_POST)){
            include('../inc/conexao.php');
            $sql="SELECT * FROM usuario WHERE cod_usuario=$usuario";
            $query=mysqli_query($con, $sql);

            if(mysqli_num_rows($query)>0){
                while(($edit=mysqli_fetch_assoc($query))!=NULL){
                    echo '
                    <center>
                        <h1 class="centro paginas">Edição do Usuário: '.$edit["nome"].'</h1>

                        <form action="#" method="POST" enctype="multipart/form-data" class="w-75 p-5">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label font">Alterar E-Mail</label> 
                                <input type="email" name="email" class="form-control" placeholder="exemplo@gmail.com" value="'.$edit['email'].'" required/>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label font">Alterar Senha</label> 
                                <input type="password" name="nova_senha" class="form-control" placeholder="*********" value="'.$edit['senha'].'" required/>
                            </div>

                            <div class="modal-footer float-right">
                                    <button class="btn btn-outline-dark collapsed" type="button" id="dropdownMenuButton1" aria-expanded="false">
                                        <a onclick="confirmacao_v_home()">Voltar para o Home</a>
                                    </button>
                                    <input type="submit" value="Confirmar"/>
                                    <button class="btn btn-outline-dark collapsed" type="button" id="dropdownMenuButton1" aria-expanded="false">
                                        <a onclick="confirmacao_excluir_usuario('.$usuario.')">Excluir Conta</a>
                                    </button>
                            </div>

                            <input type="hidden" name="editar" value="'.$usuario.'"/>
                        </form>

                    </center>';
                }
            }
            
        }else{
            include('../inc/conexao_PDO.php');

            $email=$_POST['email'];
            $senha=$_POST['nova_senha'];

            echo "$email<br>";
            echo "$senha<br>";

            $stmt_=$conPDO->query("SELECT email FROM usuario WHERE email='$email'");
            $qtd=$stmt_->rowCount();

            echo "$qtd<br>";

            if($qtd>0){
                /*header('Location: ../inc/erro_cadastro.php');*/
                echo "deu ruim";
            }else{
                echo "foi, eu acho";
                $stmt=$conPDO->query("
                UPDATE usuario SET
                email='$email',
                senha='$senha'
                WHERE cod_usuario=$usuario");
                $stmt->execute();

                /*include('../inc/disconnect.php');*/
                /*header("Location: ../php/home_user.php");*/
            }
        }
    ?>
                    

    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/teste.js"></script>
</body>
</html>