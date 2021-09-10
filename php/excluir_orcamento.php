<?php
    session_start();
    unset($_SESSION['itens']);
    header("Location: ../php/orcamento.php");
?>