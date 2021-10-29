<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" dir="ltr">
    <title>PlantaSou</title>

    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="shortcut icon" href="../imgs/logo_new.ico">
    <script>
        function inverteData($data){
            if(count(explode("/",$data)) > 1){
                return implode("-",array_reverse(explode("/",$data)));
            }elseif(count(explode("-",$data)) > 1){
                return implode("/",array_reverse(explode("-",$data)));
            }
        }
    </script>

</head>
<body>
<?php
    include("../inc/conexao_pdo.php");

    /*$stmt=$conPDO->query("SELECT cod_tabela FROM historico GROUP BY cod_tabela");
    $i=$stmt->rowCount();
    echo $i;*/
    /*while($row=$stmt->fetch(PDO::FETCH_OBJ)){
        /*echo $row->cod_historico." // ";
        echo $row->cod_usuario." // ";
        echo $row->cod_produto." // ";
        echo $row->quantidade_produto." // ";
        echo $row->data_." // ";
        echo $row->total." // ";
        echo $row->cod_tabela."<br>";
        echo $row->COUNT(*)."<br>";
    }*/
    /*<a class="nav-link nav-link-color active dropdown-toggle" aria-current="page" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><img src="../imgs/tomates.png" width="20" height="20"/> Produtos</a>*/
?>

<!--<button type="button" class="btn btn-color btn-outline-dark" aria-expanded="false"><a href="../php/remover_produto.php?id='.$resultado['cod_produto'].'" onclick="confirmacao()">Remover</a></button>

<button type="button" class="btn btn-color btn-outline-dark" data-bs-toggle="modal" data-bs-target="#produto_editar'.$produto.'">Editar</button> /*produtos*/-->

<?php
    /*include("../inc/conexao.php");

    $sql="SELECT * FROM produto ORDER BY nome asc";
    

    $query=mysqli_query($con, $sql);

    echo'
    <center>
        <table>
    ';
    $i=1;
    echo "$i";

    if(mysqli_num_rows($query)>0){
        while(($resultado=mysqli_fetch_assoc($query))!=NULL){
            if($i % 2 == 1){
                echo'<tr>
                    <td>';    
            }
            echo 
            '
            <td></td>
            <td></td>
            <td>
                <div class="card mb-5 tamanho2 text-center">
                    <div class="font">
                        <img src="../imgs/plantas/'.$resultado["imagem"].'" width="448px" height="250px"/>
                        <div class="card-body">
                            <h5 class="card-title">
                                <b class="letra">
                                    '.$resultado["nome"].'<br><br>
                                </b>
                            </h5>
                            <p class="card-text">
                                <ul>
                                    <li>'.$resultado["vitaminas"].'</li>
                                    <li>'.$resultado["beneficios"].'</li>
                                </ul>
                            </p>
                            <b class="font-money">R$ '.number_format($resultado["preco"],2).'/100g
                        </div>
                    </div>
                </div>';
                if(isset($_COOKIE["USER"])){
                    echo '
                    <div class="posicao"> 
                        <table>
                            <td>
                                <form action="orcamento.php" method="POST">
                                    <button type="submit" name="selecionar" class="font btn button-margin btn-outline-dark"><a href="orcamento.php?add=tabela&id='.$resultado['cod_produto'].'" class="altera">Selecionar</a></button>
                                </form>
                            </td>
                        </table>
                    <div>  
                        ';
                    }
                    elseif(isset($_COOKIE["ADM"])){
                        $produto=$resultado["cod_produto"];
                        echo'
                        <center>
                            <table class="posicao_bot">
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-color btn-outline-dark" aria-expanded="false"><a href="editar_produto.php?cod='.$produto.'" class="altera">Editar</a></button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-color btn-outline-dark" aria-expanded="false"><a onclick="confirmacao_p('.$resultado['cod_produto'].')">Remover</a></button>
                                </td>
                            </tr>
                            </table>
                        </center>
                            ';
                    }
                    $i++;
        }

        echo'
            </td>
        </tr>
        </table>
        </center>';
    }*/

    if(empty($_POST)){
        echo
        '
            <form action="teste.php" enctype="multipart/form-data" method="POST">
                <input type="month" name="mes"/>
                <input type="submit" value="enviar"/>
            </form>
        ';
    }else{
        $mes=$_POST["mes"];

        echo $mes;

        $teste='789';

        $mes_ = strrpos($mes, ' ') - 2;
        $mes_resul = substr($mes, $mes_);

        $year_resul = explode('-',trim($mes));


        echo "<br>número do mês: $mes_resul";
        echo "<br>número do ano: $year_resul[0]";

        echo "<br>$mes_resul-$year_resul[0]";

    }
?>

<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/teste.js"></script>

</body>
</html>