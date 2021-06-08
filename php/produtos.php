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
                            <a class="nav-link nav-link-color active" aria-current="page" href="#">🌱 Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-color" href="../php/orcamento.php">Orçamento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-color" href="../php/cultivo.php">Cultivo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-color" href="../php/historico.php">Histórico</a>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <form action="orcamento.php" method="post">
        <?php
            include("../inc/conexao.php");

            $sql="SELECT * FROM produto";

            $query=mysqli_query($con, $sql);

            if(mysqli_num_rows($query)>0){
                while(($resultado=mysqli_fetch_assoc($query))!=NULL){
                    echo 
                    '
                    <div class="p-5 text-center">
                        <div class="alert alert-success font" role="alert">
                            <div class="text-black">
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="plantas_desc text-black">
                                            '.$resultado["nome"].'<br><br>
                                            <ul>
                                                <li>'.$resultado["vitaminas"].'</li>
                                                <li>'.$resultado["beneficios"].'</li>
                                            </ul>
                                            <br>
                                            <h5 class="font">R$ '.number_format($resultado["preco"],2).' X <input type="number" value="" placeholder="Quantidade..."/></h5>
                                            <div class="right">
                                                <button type="button" name="selecionar" class="font btn btn-color">Selecionar</button>
                                            </div>
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
    </form>
</body>
</html>