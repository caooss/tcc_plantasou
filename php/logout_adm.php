<?php
    setcookie('ADM', '',time() - 3600);
    header("Location: ../php/index.php");
?>