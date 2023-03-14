<?php 
           $servername = "localhost";
           $username = "root";
           $password = "";
           $dbname = "Ceeyu";
      
$mysqli = new mysqli("$servername", "$username", "$password", "$dbname");
mysqli_set_charset($mysqli, 'UTF8');

if($mysqli->connect_error) {
  exit('Could not connect');
}
if(isset($_POST['capnhatmytk'])){
    $sql_s=$_POST['sql'];
    $row_s=$_POST['row'];


    if($sql_s==="SELECT ten FROM member WHERE  id= 1"){
        if($mysqli->query("UPDATE member set ten='$row_s' WHERE id=1 ")=== TRUE){
            header('Location: http://localhost/CEEYU/Admin/mytk.php');
        }
        $conn->close();
    }else{

    if($sql_s==="SELECT phone FROM member WHERE  id= 1"){
        if($mysqli->query("UPDATE member set phone='$row_s' WHERE id=1 ")=== TRUE){
            header('Location: http://localhost/CEEYU/Admin/mytk.php');
        }
        $conn->close();
    }
else{
    if($sql_s==="SELECT email FROM member WHERE  id= 1"){
        if($mysqli->query("UPDATE member set email='$row_s' WHERE id=1 ")=== TRUE){
            header('Location: http://localhost/CEEYU/Admin/mytk.php');
        }
        $conn->close();
    }
    else{
    if($sql_s==="SELECT address FROM member WHERE  id= 1"){
        if($mysqli->query("UPDATE member set address='$row_s' WHERE id=1 ")=== TRUE){
            header('Location: http://localhost/CEEYU/Admin/mytk.php');
        }
        $conn->close();
    }
}}}


}

$conn->close();

?>