<?php
    if(empty($_COOKIE["USER"])){
      header ("Location: ../php/index.php");
    }else{
      setcookie('USER', $_COOKIE["USER"], time()+1800);
    }
    $usuario= $_COOKIE["USER"];

?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <meta charset="utf-8">
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
        <a class="nav-link nav-link-color active" aria-current="page" href="#">🏠 Home</a>
        <a class="nav-link nav-link-color" href="./produtos.php">Produtos</a>
        <a class="nav-link nav-link-color" href="../php/orcamento.php">Orçamento</a>
        <a class="nav-link nav-link-color" href="./cultivo.php">Cultivos</a>
        <a class="nav-link nav-link-color" href="../php/historico?num=0.php">Histórico</a>
        <a class="nav-link nav-link-color" href="./logout_user.php"><img src="../imgs/out.png" width="15" height="15"/> Sair</a>
      </div>
    </nav>

    <div>
      <a class="nav-link active_usuario">Seja bem-vindo(a) ao site
      <?php
        include('../inc/conexao.php');
        $sql="SELECT nome FROM usuario WHERE cod_usuario=$usuario";
        $query=mysqli_query($con, $sql);
        
        if(mysqli_num_rows($query)>0){
          while(($nome=mysqli_fetch_assoc($query))!=NULL){
              echo $nome['nome'];
          }
        }
      ?>
      </a>
    </div>
        
    <div class="parallax">
      <p class="fonte">PlantaSou</p>
      <p class="fonte2">Web auxílio alimentar</p>
    </div>
    
      <div class="bg" style="background-color: white;">
            <div class="p-5 altura">
                <div class="font">
                  <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-black">
                      <div style="color: black;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
                        <h1 class="titulo mb-3" align="center">PlantaSou?</h1>
                        <div class="container">
                        <p class="font text-justify">
                            <ul>
                              <li>
                              O PlantaSou foi elaborado pensando na necessidade de aumentar o consumo de alimentos orgânicos na sociedade, que cada vez mais tende a preferir 
                                alimentos industrializados de fácil e rápido acesso. 
                              </li>
                              </br>
                              <li>  
                                Assim, auxiliamos nossos usuários no cultivo de seus próprios alimentos, desde a terra e o adubo, até os benefícios e características de cada 
                                fruta, legume e vegetal, tendo em vista que essa prática ajuda na diminuição de gastos na alimentação e coloca o consumidor mais próximo de sua comida.<br><br>
                              </li>
                            </ul>
                          </p>
                      </div> 
                </div>
              </div>
            </div>
          </div>
      </div>   

      <div class="parallax_2"></div>
                        
      <div class="bg">
            <div class="p-5 altura">
                <div class="font">
                  <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-black">
                      <div style="color: black;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
                        <div class="container">
                          <center>
                            <p>
                                <table>
                                  <tr>
                                  <td><h3><b>Parabéns</b>, agora você faz parte do PlantaSou!!</h3></td>
                                  </tr>
                                </table>
                            </p>
                          </center>
                          <br>
                          <br>
                        <p class="font text-justify titulo2" align="center">
                          <b>Orientações sobre as páginas</b>
                        </p>
                        
                        <p class="font text-justify">
                            <table>
                              <tr>
                                <td>
                                  <div class="card mb-3 tamanho">
                                  <a class="link" href="./produtos.php"><img src="../imgs/fundos/produtos.jpeg" class="card-img-top"></a>
                                    <div class="card-body">
                                      <h4 class="card-title"><b>Produtos</b></h4>
                                      <p class="card-text">
                                        Na página <a class="link" href="./produtos.php">produtos</a>, serão disponibilizados alguns alimentos e suas sementes, além de suas informações nutricionais e seus valores estimados no mercado. 
                                        Se possuir cadastro, o site oferece ao usuário a opção de selecionar os alimentos desejados, apresentando eles na página do orçamento.
                                      </p>
                                    </div>
                                  </div>
                                </td>

                                <td>
                                  <div class="card mb-3 tamanho">
                                  <img src="../imgs/fundos/orcamento.jpeg" class="card-img-top">
                                    <div class="card-body">
                                      <h4 class="card-title"><b>Orçamento</b></h4>
                                      <p class="card-text">
                                          Na página <a href="./orcamento.php">orçamento</a>, se possuir cadastro, irá conter uma tabela com o produto, seu valor estimado e a quantidade escolhida pelo usuário, determinando o valor 
                                          estimado total dos cultivos que serão feitos.
                                      </p>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <div class="card mb-3 tamanho">
                                    <a href="./cultivo.php"><img src="../imgs/fundos/cultivos.jpeg" class="card-img-top"></a>
                                      <div class="card-body">
                                        <h4 class="card-title"><b>Cultivos</b></h4>
                                        <p class="card-text">
                                          Na página <a href="./cultivo.php">cultivos</a>, estarão presentes as informações detalhadas de cada etapa da cultivação dos alimentos indicados na plataforma.
                                        </p>
                                      </div>
                                    </div>
                                  </td>

                                  <td>
                                    <div class="card mb-3 tamanho">
                                    <img src="../imgs/fundos/historico.jpeg" class="card-img-top">
                                      <div class="card-body">
                                        <h4 class="card-title"><b>Histórico</b></h4>
                                        <p class="card-text">
                                          Na página <a href="./historico?num=0.php">histórico</a>, se possuir cadastro, o usuário poderá encontrar todos os produtos já selecionados.
                                        </p>
                                      </div>
                                    </div>
                                  </td>
                              </tr>
                            </table>
                          </p>

                        <p class="direito_autoral">
                          Direito autoral dos ícones:
                          <div class="direito_autoral">Ícones feitos por Vectto no <a href="https://www.iconfinder.com/" title="Iconfinder">www.iconfinder.com</a></div>
                          <div class="direito_autoral">Ícones feitos por <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/br/" title="Flaticon">www.flaticon.com</a></div>
                        </p>
                    </div> 
                </div>
              </div>
            </div>
          </div>
      </div>

          <div class="footer">
            Email: equipeplantasou@gmail.com
          </div>

        </div>

        <script src="../js/jquery-3.5.1.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    </body>
</html>
