<?php
session_start();
$return_url = base64_decode($_GET["return_url"]); //return url
unset($_SESSION['ten']);
header('Location:'.$return_url);
?>