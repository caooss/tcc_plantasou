<?php
    setcookie('USER', '',time() - 3600);
    header("Location: ../php/index.php");
?>