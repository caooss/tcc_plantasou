<?php
    session_start();
    setcookie('USER', '',time() - 3600);
    header("Location: ../php/index.php");
    unset($_SESSION['itens']);
?>