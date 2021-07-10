<?php
    session_start();

    if(isset($_GET['mudar']) && $_GET['mudar'] == "tabela"){
        $idProduto = $_GET['id'];
        unset($_SESSION['itens'] [$idProduto]);
        echo'<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=orcamento.php">';
    }
?>