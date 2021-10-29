<!--<div class="modal fade" id="produto_editar<?php /*echo $produto*/?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel_">Edite um produto</h5>
                <button type="button" class="btn-close cor_x" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">-->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>PlantaSou</title>
        <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/estilo.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
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
                            <a class="nav-link nav-link-color active" aria-current="page" href="#"><img src="../imgs/tomates.png" width="20" height="20"/> Produtos</a>
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
                            <a class="nav-link nav-link-color" aria-current="page" href="#"><img src="../imgs/crescer-planta.png" width="20" height="20"/> Cultivos</a>
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
                <?php
                    $produto=$_GET["cod"];
                    if(empty($_POST)){
                        include('../inc/conexao.php');
                        $sql="SELECT * FROM produto WHERE cod_produto=$produto";
                        $query=mysqli_query($con, $sql);

                        if(mysqli_num_rows($query)>0){
                            while(($edit=mysqli_fetch_assoc($query))!=NULL){
                                echo '
                                
                                <h1 class="centro paginas">Edição do Produto: '.$edit["nome"].'</h1>

                                <center>
                                    <form action="editar_produto.php?cod=0" method="POST" enctype="multipart/form-data" class="w-75 p-5">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Produto</label> 
                                            <input type="text" name="nome" class="form-control" placeholder="Produto..." value="'.$edit["nome"].'" required/>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Vitaminas</label> 
                                            <input type="text" name="vitaminas" class="form-control" placeholder="Vitaminas..." value="'.$edit["vitaminas"].'"/ required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Benefícios</label> 
                                            <input type="text" name="beneficios" class="form-control" placeholder="Benefícios..." value="'.$edit["beneficios"].'"/ required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Preço</label> 
                                            <input type="number" step="any" name="preco" class="form-control" placeholder="Preço..." value="'.$edit["preco"].'"/ required>
                                        </div>';

                                        echo '
                                        <div class="mb-3">
                                            <select name="cod_cultivo" value="'.$edit["cod_cultivo"].'">
                                        ';
                            }
                        }
                            
                                    $sql_="SELECT cod_cultivo, nome FROM cultivo";
                                    $query_=mysqli_query($con, $sql_);

                                    if(mysqli_num_rows($query_)>0){
                                        while(($cod_do_cultivo=mysqli_fetch_assoc($query_))!=NULL){
                                            echo'
                                                <option value="'.$cod_do_cultivo["cod_cultivo"].'">'.$cod_do_cultivo["nome"].'</option>
                                            ';
                                        }
                                    }
                                    echo'
                                            </select>
                                        <div>
                                    ';

                                    include('../inc/disconnect.php');

                                    echo'
                                    <div class="mb-3 mx-auto">
                                        <label for="exampleFormControlInput1" class="form-label">Imagem</label>
                                        <input type="file" class="form-control" id="exampleFormControlInput1_" name="imagem" accept="image/png, image/jpg">
                                    </div>

                                    <div class="modal-footer float-right">
                                        <button type="button" class="btn btn-outline-success fechar" onClick="history.go(-1)">Fechar</button>
                                        <button type="submit" class="btn btn-outline-success borda-modal">Modificar</button>
                                    </div>

                                    <input type="hidden" name="editar" value="'.$produto.'"/>
                                </form>
                            </centar>
                        
                            <script src="../js/jquery-3.5.1.min.js"></script>
                            <script src="../js/popper.min.js"></script>
                            <script src="../js/bootstrap.min.js"></script>';
                /*</div>
        </div>
    </div>
</div>';*/
                    }else{
                        include('../inc/conexao.php');
                        if($_FILES['imagem']['size'] == 0){
                            $nome=$_POST['nome'];
                            $vitaminas=$_POST['vitaminas'];
                            $beneficios=$_POST['beneficios'];
                            $preco=$_POST['preco'];
                            $cod_cultivo=$_POST['cod_cultivo'];
                            $produto=$_POST['editar'];

                            $sqlEdit="UPDATE produto SET
                            nome='$nome',
                            vitaminas='$vitaminas',
                            beneficios='$beneficios',
                            preco=$preco,
                            cod_cultivo=$cod_cultivo
                            WHERE cod_produto=$produto";

                            $queryEdit=mysqli_query($con, $sqlEdit);

                            header("Location: ../php/produtos.php");
                            
                        }else{
                            $nome=$_POST['nome'];
                            $vitaminas=$_POST['vitaminas'];
                            $beneficios=$_POST['beneficios'];
                            $preco=$_POST['preco'];
                            $cod_cultivo=$_POST['cod_cultivo'];
                            $imagem=$_FILES['imagem'];
                            $produto=$_POST['editar'];


                            $extensao=strtolower(substr($imagem['name'], -4)); //pega a extensão
                            $novo_nome=md5(time()).$extensao; //define um nome novo para o arquivo
                            $diretorio="../imgs/plantas/"; //define o diretório para onde enviaremos o arquivo

                            move_uploaded_file($imagem['tmp_name'], $diretorio.$novo_nome); //efetua o upload

                            $sqlEdit="UPDATE produto SET
                            nome='$nome',
                            vitaminas='$vitaminas',
                            beneficios='$beneficios',
                            preco=$preco,
                            cod_cultivo=$cod_cultivo,
                            imagem='$novo_nome'
                            WHERE cod_produto=$produto";

                            $queryEdit=mysqli_query($con, $sqlEdit);

                            header("Location: ../php/produtos.php");
                        }
                        
                    }
                    ?>
</body>
</html>