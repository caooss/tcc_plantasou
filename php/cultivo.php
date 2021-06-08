<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" dir="ltr">
    <title>PlantaSou</title>

    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>
    <div class="navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <div class="media">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <a class="navbar-brand plantasou" href="#">
                        <!--<img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">-->
                        <img src="../imgs/logo_new.jpeg" class="align-self-center mr-3 rounded float-right" width="75" height="75" alt="...">
                        PlantaSou
                    </a>
                    
                        <ul class="navbar-nav nav-pills nav-link-color me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-link-color" href="../php/home_user.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-color" href="../php/produtos.php">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-color" href="../php/orcamento.php">Orçamento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-color active" aria-current="page" href="#">🌎 Cultivo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-color" href="../php/historico.php">Histórico</a>
                        </li>
                        <li class="margin">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                                <button class="btn btn-outline-success nav-link-color borda" type="submit">Search</button>
                            </form>
                        </li>

                        </ul>

                    </div>
                </div>
            </div>
        </nav>
    </div>

    <?php
        include("../inc/conexao.php");

        $sql="SELECT * FROM cultivo";

        $query=mysqli_query($con, $sql);

        if(mysqli_num_rows($query)>0){
            while(($resultado=mysqli_fetch_assoc($query))!=NULL){
                echo 
                '
                <div class="p-5 text-center">
                    <div class="alert alert-success font" role="alert">
                        <table class="table table-bordered">
                            <tr>
                                <td class="plantas_desc text-black"><h2>
                                    '.$resultado["nome"].'</h2><br><br>
                                    <ul>
                                        <li><h4>Clima:</h4>'.$resultado["clima"].'</li><br>
                                        <li><h4>Espaço:</h4>'.$resultado["espaco"].'</li><br>
                                        <li><h4>Plantio:</h4>'.$resultado["plantio"].'</li><br>
                                        <li><h4>Luminosidade:</h4>'.$resultado["luminosidade"].'</li><br>
                                        <li><h4>Irrigação:</h4>'.$resultado["irrigacao"].'</li><br>
                                        <li><h4>Tempo para a colheita:</h4>'.$resultado["temp_colheita"].'</li><br>
                                    </ul>
                                    <br>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                ';
            }
        }else{
            echo mysqli_error($con);
        }

        include("../inc/disconnect.php");
    ?>
</body>
</html>