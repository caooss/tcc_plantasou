<?php
    if(empty($_COOKIE["USER"])){
      header ("Location: ../php/index.php");
    }else{
      setcookie('USER', $_COOKIE["USER"], time()+600);
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

        <div class="navbar-custom">
          <nav class="navbar navbar-expand-lg navbar-dark ">
            <div class="media">
              <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <a class="navbar-brand plantasou" href="#">
                    <img src="../imgs/logo_new.jpeg" class="align-self-center mr-3 rounded float-right" width="50" height="50" alt="...">
                    PlantaSou
                  </a>
                
                  <ul class="navbar-nav nav-pills nav-link-color me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link nav-link-color active" aria-current="page" href="#">🏠 Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link nav-link-color" href="./produtos.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link nav-link-color" href="./orcamento.php">Orçamento</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link nav-link-color" href="./cultivo.php">Cultivo</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link nav-link-color" href="./historico.php">Histórico</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link nav-link-color" href="./logout_user.php">Sair</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link nav-link-color active_usuario ">Seja bem-vindo(a) 
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
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>

        <div class="bg">
            <div class="p-5">
                <div class="alert font">
                  <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-black">
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
                          
                        <p>
                            <table>
                              <tr>
                                <td><img src="../imgs/icone_colorido.png" width="100" height="100"/><td>
                                <td> Quer possuir todos os benefícios que o PlantaSou oferece? <b>Cadastre-se já!!</b></br>
                                     Com o cadastro, você pode:</br>
                                      <ul>
                                          <li>Fazer a seleção dos produtos na página <a class="link" href="./produtos.php">produtos</a>;</li>
                                          <li>Obter uma página <a href="./orcamento.php">orçamento</a> para calcular seus gatos com a horta;</li>
                                          <li>Possuir a página <a href="./historico.php">histórico</a> com seus orçamentos.</li>
                                      </ul>
                                </td>
                              </tr>
                            </table>
                        </p>

                        <p class="font-weight-bold font text-justify">
                          Orientações sobre as páginas
                        </p>

                        <p class="font text-justify">
                            <table>
                              <tr>
                                <td>
                                  <a class="link" href="./produtos.php">
                                    <img src="../imgs/tomates.png" width="70" height="70"/>
                                  </a>
                                </td>
    
                                <td>
                                  Na página <a class="link" href="./produtos.php">produtos</a>, serão disponibilizados alguns alimentos e suas sementes, além de suas informações nutricionais e seus valores estimados no mercado. 
                                  Se possuir cadastro, o site oferece ao usuário a opção de selecionar os alimentos desejados, apresentando eles na página do orçamento.
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="./orcamento.php">
                                    <img src="../imgs/moeda.png" width="70" height="70"/>
                                  </a>
                                </td>
                                
                                <td>
                                  Na página <a href="./orcamento.php">orçamento</a>, se possuir cadastro, irá conter uma tabela com o produto, seu valor estimado e a quantidade escolhida pelo usuário, determinando o valor 
                              estimado total dos cultivos que serão feitos.
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="./cultivo.php">
                                    <img src="../imgs/crescer-planta.png" width="70" height="70"/>
                                  </a>
                                </td>
                                
                                <td>
                                  Na página <a href="./cultivo.php">cultivo</a>, estarão presentes as informações detalhadas de cada etapa da cultivação dos alimentos indicados na plataforma.
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <a href="./historico.php">
                                    <img src="../imgs/livro.png" width="70" height="70"/>
                                  </a>
                                </td>
                                
                                <td>
                                  Na página <a href="./historico.php">histórico</a>, se possuir cadastro, o usuário poderá encontrar todos os produtos já selecionados.
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
        
          <div class="footer">
            Email: equipeplantasou@gmail.com
          </div>

        </div>

        <?php
          include "../inc/login.inc";
          include "../inc/cadastro.php";
        ?>

        <script src="../js/jquery-3.5.1.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    </body>
</html>
