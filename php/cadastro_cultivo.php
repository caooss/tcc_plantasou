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
        <div class="modal fade" id="cadastro_cultivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastre um novo cultivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?php
                  if(empty($_POST)){
                    echo '
                      <form action="cadastro_cultivo.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label font">Nome</label> 
                            <input type="text" name="nome" class="form-control" placeholder="Nome..." required/>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label font">Clima</label> 
                            <textarea name="clima" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label font">Plantio</label> 
                            <textarea name="plantio" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label font">Luminosidade</label> 
                            <textarea name="luminosidade" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label font">Irrigação</label> 
                            <textarea name="irrigacao" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label font">Tempo de Colheita</label> 
                            <textarea name="temp_colheita" required></textarea>
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
                  <script src="../js/bootstrap.min.js"></script>

                  </div>
            </div>
          </div>
        </div>
          ';
                    
                    }else{
                        include('../inc/conexao.php');
                        $nome=$_POST['nome'];
                        $clima=$_POST['clima'];
                        $plantio=$_POST['plantio'];
                        $luminosidade=$_POST['luminosidade'];
                        $irrigacao=$_POST['irrigacao'];
                        $temp_colheita=$_POST['temp_colheita'];

                        $sql="INSERT INTO cultivo (nome, clima, plantio, luminosidade, irrigacao, temp_colheita)
                              VALUES ('$nome', '$clima', '$plantio', '$luminosidade', '$irrigacao', '$temp_colheita')";
                        
                        $query=mysqli_query($con, $sql);
                        include('../inc/disconnect.php');

                        header("Location: ../php/cultivo.php");
                    }
                    
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>