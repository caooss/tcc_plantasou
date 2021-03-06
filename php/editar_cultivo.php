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
                            <a class="nav-link nav-link-color active" aria-current="page" href="#"><img src="../imgs/tomates.png" width="20" height="20"/> Produtos</a>
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
                                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-bs-haspopup="true" aria-bs-expanded="false">
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
                                <a class="nav-link nav-link-color" href="../php/historico.php?num=0">Hist??rico</a>
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
                    $cod_cultivo=$_GET["cod"];
                    if(empty($_POST)){
                        include('../inc/conexao.php');
                        $sql="SELECT * FROM cultivo WHERE cod_cultivo=$cod_cultivo";
                        $query=mysqli_query($con, $sql);

                        if(mysqli_num_rows($query)>0){
                            while(($edit=mysqli_fetch_assoc($query))!=NULL){
                                echo '
                                <center>
                                    <h1 class="centro paginas">Edi????o do Cultivo: '.$edit["nome"].'</h1>

                                    <form action="editar_cultivo.php?cod=0" method="POST" enctype="multipart/form-data" class="w-75 p-5">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label font">Nome</label> 
                                            <input type="text" name="nome" class="form-control" placeholder="Nome..." value="'.$edit['nome'].'" required/>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label font">Clima</label> 
                                            <textarea name="clima" value="'.$edit['clima'].'" cols="50" rows="4" required>'.$edit['clima'].'</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label font">Plantio</label> 
                                            <textarea name="plantio" value="'.$edit['plantio'].'" cols="50" rows="4" required>'.$edit['plantio'].'</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label font">Luminosidade</label> 
                                            <textarea name="luminosidade" value="'.$edit['luminosidade'].'" cols="50" rows="4" required>'.$edit['luminosidade'].'</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label font">Irriga????o</label> 
                                            <textarea name="irrigacao" value="'.$edit['irrigacao'].'" cols="50" rows="4" required>'.$edit['irrigacao'].'</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label font">Tempo de Colheita</label> 
                                            <textarea name="temp_colheita" value="'.$edit['temp_colheita'].'" cols="50" rows="4" required>'.$edit['temp_colheita'].'</textarea>
                                        </div>

                                        <div class="mb-3 mx-auto">
                                            <label for="exampleFormControlInput1" class="form-label">Imagem</label>
                                            <input type="file" class="form-control" id="exampleFormControlInput1_" name="imagem" accept="image/png, image/jpg">
                                        </div>

                                        <div class="modal-footer float-right">
                                                <button type="button" class="btn btn-outline-success fechar" onClick="history.go(-1)">Fechar</button>
                                                <button type="submit" class="btn btn-outline-success borda-modal">Modificar</button>
                                        </div>

                                        <input type="hidden" name="editar" value="'.$cod_cultivo.'"/>
                                    </form>
                                </center>
                                
                                <script src="../js/jquery-3.5.1.min.js"></script>
                                <script src="../js/popper.min.js"></script>
                                <script src="../js/bootstrap.min.js"></script>
                                <script src="../js/teste.js"></script>';
                            }
                        }
                        
                    }else{
                        include('../inc/conexao.php');
                        if($_FILES['imagem']['size'] == 0){
                            $nome=$_POST['nome'];
                            $clima=$_POST['clima'];
                            $plantio=$_POST['plantio'];
                            $luminosidade=$_POST['luminosidade'];
                            $irrigacao=$_POST['irrigacao'];
                            $temp_colheita=$_POST['temp_colheita'];
                            $cod_cultivo=$_POST['editar'];

                            $sqlEdit="UPDATE cultivo SET
                            nome='$nome',
                            clima='$clima',
                            plantio='$plantio',
                            luminosidade='$luminosidade',
                            irrigacao='$irrigacao',
                            temp_colheita='$temp_colheita'
                            WHERE cod_cultivo=$cod_cultivo";

                            $queryEdit=mysqli_query($con, $sqlEdit);

                            header("Location: ../php/cultivo.php");
                        }else{
                            $nome=$_POST['nome'];
                            $clima=$_POST['clima'];
                            $plantio=$_POST['plantio'];
                            $luminosidade=$_POST['luminosidade'];
                            $irrigacao=$_POST['irrigacao'];
                            $temp_colheita=$_POST['temp_colheita'];
                            $imagem=$_FILES['imagem'];
                            $cod_cultivo=$_POST['editar'];

                            $extensao=strtolower(substr($imagem['name'], -4)); //pega a extens??o
                            $novo_nome=md5(time()).$extensao; //define um nome novo para o arquivo
                            $diretorio="../imgs/plantas/"; //define o diret??rio para onde enviaremos o arquivo

                            move_uploaded_file($imagem['tmp_name'], $diretorio.$novo_nome); //efetua o upload

                            $sqlEdit="UPDATE cultivo SET
                            nome='$nome',
                            clima='$clima',
                            plantio='$plantio',
                            luminosidade='$luminosidade',
                            irrigacao='$irrigacao',
                            temp_colheita='$temp_colheita',
                            src='$novo_nome'
                            WHERE cod_cultivo=$cod_cultivo";

                            $queryEdit=mysqli_query($con, $sqlEdit);

                            header("Location: ../php/cultivo.php");
                        }
                            
                    }
?>
</body>
</html>