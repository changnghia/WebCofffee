<?php
session_start();
unset($_SESSION['ten']);
header('Location: http://localhost/CEEYU/login/login.php');
?>