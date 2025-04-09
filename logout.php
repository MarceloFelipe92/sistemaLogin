<?php
session_start();
session_destroy();
header("Location: sistema-login.php");
exit;
?>
