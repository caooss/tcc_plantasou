<?php
    /*Ainda será feito a identificação do user*/
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>PlantaSou</title>

        <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="./css/estilo.css">
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="navbar-custom">
          <nav class="navbar navbar-expand-lg navbar-dark ">
            <div class="media">
              <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <a class="navbar-brand" href="#">
                    <!--<img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">-->
                    <img src="./imgs/logo_lo.png" class="align-self-center mr-3 rounded float-right" width="100" height="100" alt="...">
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
                  </ul>
                  <!--<form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>-->
                </div>
              </div>
            </div>
          </nav>
        </div>

        <div class="bg">
            <div class="p-5">
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
                  <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="font text-white">
                      <h1 class="titulo mb-3" align="center">PlantaSou?</h1>
                      <div class="container">
                        <p class="font text-justify">
                          Grande parte da população brasileira não possui acesso aos alimentos saudáveis, muitas vezes por não terem conhecimento sobre o local onde podem ser 
                          adquiridos os produtos e pela ideia de que existe um alto custo para eles.<br>
                          Por isso, o PlantaSou foi elaborado pensando na necessidade de aumentar o consumo de alimentos orgânicos na sociedade, que cada vez mais tende a preferir 
                          alimentos industrializados de fácil e rápido acesso.<br>
                          O PlantaSou auxilia seus usuários no cultivo de seus próprios alimentos, desde a terra e o adubo, até os benefícios e características de cada 
                          fruta, legume e vegetal, tendo em vista que essa prática ajuda na diminuição de gastos na alimentação e coloca o consumidor mais próximo de sua comida.<br><br>
                        </p>

                        <p class="font-weight-bold font text-justify">
                          Orientações sobre as páginas
                        </p>

                        <p class="font text-justify">
                            <table>
                              <tr>
                                <td><img src="./imgs/tomates.png" width="70" height="70"/></td>
    
                                <td>
                                  Na página <a class="link" href="./produtos.php">produtos</a>, serão disponibilizados alguns alimentos e suas sementes, além de suas informações nutricionais e seus valores estimados no mercado. 
                                  Se possuir cadastro, o site oferece ao usuário a opção de selecionar os alimentos desejados, apresentando eles na página do orçamento.
                                </td>
                              </tr>
                              <tr>
                                <td><img src="./imgs/moeda.png" width="70" height="70"/></td>
                                
                                <td>
                                  Na página <a href="./orcamento.php">orçamento</a>, se possuir cadastro, irá conter uma tabela com o produto, seu valor estimado e a quantidade escolhida pelo usuário, determinando o valor 
                              estimado total dos cultivos que serão feitos.
                                </td>
                              </tr>
                              <tr>
                                <td><img src="./imgs/crescer-planta.png" width="70" height="70"/></td>
                                
                                <td>
                                  Na página <a href="./cultivo.php">cultivo</a>, estarão presentes as informações detalhadas de cada etapa da cultivação dos alimentos indicados na plataforma.
                                </td>
                              </tr>
                              <tr>
                                <td><img src="./imgs/livro.png" width="70" height="70"/></td>
                                
                                <td>
                                  Na página <a href="./historico.php">histórico</a>, se possuir cadastro, o usuário poderá encontrar todos os produtos já selecionados.
                                </td>
                              </tr>
                            </table>
                          </p>
                        <p>
                          Direito autoral dos ícones:
                           <div>Ícones feitos por <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/br/" title="Flaticon">www.flaticon.com</a></div>
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
    </body>
</html>
