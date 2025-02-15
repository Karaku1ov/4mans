<?php
session_start();
session_destroy();
setcookie("user", "", time() - 3600, "/"); 
header("Location: auth.php"); 
exit();
?>
