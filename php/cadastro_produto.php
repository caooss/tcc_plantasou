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

        
        <!--<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastre um novo produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">-->

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
                  if(empty($_POST)){
                    echo '
                      <form action="cadastro_produto.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Produto</label> 
                            <input type="text" name="nome" class="form-control" placeholder="Produto..." required/>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Vitaminas</label> 
                            <input type="text" name="vitaminas" class="form-control" placeholder="Vitaminas..."/ required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Benefícios</label> 
                            <input type="text" name="beneficios" class="form-control" placeholder="Benefícios..."/ required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Preço</label> 
                            <input type="number" step="any" name="preco" class="form-control" placeholder="Preço..."/ required>
                        </div>';

                        echo '
                            <div class="mb-3">
                                <select name="cod_cultivo">
                        ';
                        include('../inc/conexao.php');
                        $sql="SELECT cod_cultivo, nome FROM cultivo";
                        $query=mysqli_query($con, $sql);

                        if(mysqli_num_rows($query)>0){
                            while(($cod_do_cultivo=mysqli_fetch_assoc($query))!=NULL){
                                echo'
                                    <option value="'.$cod_do_cultivo["cod_cultivo"].'">'.$cod_do_cultivo["nome"].'</option>
                                ';
                            }
                        }
                        echo'
                                </select>
                            <div>
                        ';

                        echo'
                        <div class="mb-3 mx-auto">
                            <label for="exampleFormControlInput1" class="form-label">Imagem</label>
                            <input type="file" class="form-control" id="exampleFormControlInput1" required name="imagem">
                        </div>

                        <div class="modal-footer float-right">
                          <button type="button" class="btn btn-outline-success nav-link-color fechar" data-bs-dismiss="modal">Fechar</button>
                          <button type="submit" class="btn btn-outline-success nav-link-color borda-modal">Adicionar</button>
                        </div>
                      </form>
                    ';
                  echo '
                  <script src="../js/jquery-3.5.1.min.js"></script>
                  <script src="../js/popper.min.js"></script>
                  <script src="../js/bootstrap.min.js"></script>';

              /*</div>
            </div>
          </div>
        </div>
          ';*/
                    
                    }else{
                        include('../inc/conexao.php');
                        $nome=$_POST['nome'];
                        $vitaminas=$_POST['vitaminas'];
                        $beneficios=$_POST['beneficios'];
                        $preco=$_POST['preco'];
                        $cod_cultivo=$_POST['cod_cultivo'];
                        $imagem=$_FILES['imagem'];

                        $extensao=strtolower(substr($imagem['name'], -4)); //pega a extensão
                        $novo_nome=md5(time()).$extensao; //define um nome novo para o arquivo
                        $diretorio="../imgs/plantas/"; //define o diretório para onde enviaremos o arquivo

                        move_uploaded_file($imagem['tmp_name'], $diretorio.$novo_nome); //efetua o upload

                        $sql="INSERT INTO produto (nome, vitaminas, beneficios, preco, cod_cultivo, imagem)
                              VALUES ('$nome', '$vitaminas', '$beneficios', $preco, $cod_cultivo, '$novo_nome')";
                        
                        $query=mysqli_query($con, $sql);

                        include('../inc/disconnect.php');

                        header("Location: ../php/produtos.php");
                    }
                    
                ?>

</body>
</html>