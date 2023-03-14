<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname="ceeyu";
$conn = new mysqli ($servername, $username, $password, $dbname) or die ('Không thể kết nối tới database');
mysqli_set_charset($conn, 'UTF8');

if($conn === false){ 
die("ERROR: Could not connect. " . mysqli_connect_error()); 
}
else {

}
?>