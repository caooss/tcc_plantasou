<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>PlantaSou</title>
        <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/estilo.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
        <link rel="shortcut icon" href="../imgs/logo_new.ico">
        <script src="../js/autoresize.jquery.js"></script>
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
                                <a class="nav-link nav-link-color" aria-current="page" href="#"><img src="../imgs/tomates.png" width="20" height="20"/> Produtos</a>
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
                                <a class="nav-link nav-link-color active" aria-current="page" href="#"><img src="../imgs/crescer-planta.png" width="20" height="20"/> Cultivos</a>
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
                  if(empty($_POST)){
                    echo '
                    <center>
                      <form action="#" method="POST" enctype="multipart/form-data" class="w-75 p-5">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label font">Nome</label> 
                            <input type="text" name="nome" class="form-control" placeholder="Nome..." required/>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label font">Clima</label> 
                            <textarea name="clima" cols="50" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label font">Plantio</label> 
                            <textarea name="plantio" cols="50" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label font">Luminosidade</label> 
                            <textarea name="luminosidade" cols="50" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label font">Irrigação</label> 
                            <textarea name="irrigacao" cols="50" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label font">Tempo de Colheita</label> 
                            <textarea name="temp_colheita" cols="50" rows="4" required></textarea>
                        </div>

                        <div class="mb-3 mx-auto">
                            <label for="exampleFormControlInput1" class="form-label font">Imagem</label>
                            <input type="file" class="form-control" id="exampleFormControlInput1" required name="imagem">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label font">Nome_Php</label> 
                            <input type="text" name="nome_php" class="form-control" placeholder="Nome Php..." required/>
                        </div>

                        <div class="modal-footer float-right">
                          <button type="button" class="btn btn-outline-success nav-link-color fechar" data-bs-dismiss="modal">Fechar</button>
                          <button type="submit" class="btn btn-outline-success nav-link-color borda-modal">Adicionar</button>
                        </div>
                      </form>
                    </center>
                    ';
                  echo '
                  <script src="../js/jquery-3.5.1.min.js"></script>
                  <script src="../js/popper.min.js"></script>
                  <script src="../js/bootstrap.min.js"></script>
                  <script src="../js/teste.js"></script>
          ';
                    
                    }else{
                        include('../inc/conexao.php');
                        $nome=$_POST['nome'];
                        $clima=$_POST['clima'];
                        $plantio=$_POST['plantio'];
                        $luminosidade=$_POST['luminosidade'];
                        $irrigacao=$_POST['irrigacao'];
                        $temp_colheita=$_POST['temp_colheita'];
                        $imagem=$_FILES['imagem'];
                        $nome_php=$_POST['nome_php'];

                        $extensao=strtolower(substr($imagem['name'], -4)); //pega a extensão
                        $novo_nome=md5(time()).$extensao; //define um nome novo para o arquivo
                        $diretorio="../imgs/plantas/"; //define o diretório para onde enviaremos o arquivo

                        move_uploaded_file($imagem['tmp_name'], $diretorio.$novo_nome); //efetua o upload

                        $sql="INSERT INTO cultivo (nome, clima, plantio, luminosidade, irrigacao, temp_colheita, src, nome_php)
                              VALUES ('$nome', '$clima', '$plantio', '$luminosidade', '$irrigacao', '$temp_colheita','$novo_nome', '$nome_php')";
                        
                        $query=mysqli_query($con, $sql);
                        include('../inc/disconnect.php');

                        header("Location: ../php/cultivo.php");
                    }
                    
                ?>
              <!--</div>
            </div>
          </div>
        </div>
      </div>
    </div>


</div>
            </div>
          </div>
        </div>-->
</body>
</html>