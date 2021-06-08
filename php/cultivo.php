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
                        <a class="navbar-brand" href="#">
                        <!--<img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">-->
                        <img src="../imgs/logo_lo.png" class="align-self-center mr-3 rounded float-right" width="100" height="100" alt="...">
                        PlantaSou
                        </a>
                    
                        <ul class="navbar-nav nav-pills nav-link-color me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-link-color" href="home_user.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-color active" aria-current="page" href="#">🌱 Produtos</a>
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
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <?php
        include("../inc/conexao.php");

        $sql="SELECT * FROM cultivo";

        $query=mysqli_query($con, $sql);

        echo '
        <div class="p-5 text-center">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
                <div class="font text-white">
                    <table class="table table-bordered">
        
        ';

        if(mysqli_num_rows($query)>0){
            while(($resultado=mysqli_fetch_assoc($query))!=NULL){
                echo 
                '
                    <tr>
                        <td class="plantas_desc text-white">
                            '.$resultado["nome"].'<br><br>
                            <ul>
                                <li><h2>Clima:</h2> '.$resultado["clima"].'</li><br>
                                <li>'.$resultado["espaco"].'</li><br>
                                <li>'.$resultado["plantio"].'</li><br>
                                <li>'.$resultado["luminosidade"].'</li><br>
                                <li>'.$resultado["irrigacao"].'</li><br>
                                <li>'.$resultado["temp_colheita"].'</li><br>
                            </ul>
                            <br>
                        </td>
                    </tr>
                ';
            }
        }else{
            echo mysqli_error($con);
        }

        include("../inc/disconnect.php");

        echo '
                    </table>
                </div>
            </div>
        </div>
                    
        ';
    ?>
</body>
</html>