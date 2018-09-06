<?php
 session_start();
 session_destroy();
 header("Location: /SeLab/login.php");
exit;
?>