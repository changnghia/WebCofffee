<?php
    include 'connection.php';
    if(isset($_POST['thaydoi'])){
        $password=$_POST['password'];
        $sql="UPDATE member set password='$password' where id=1";
        if($conn->query($sql)===TRUE){
            header('Location: http://localhost/CEEYU/Admin/doimk.php');

        }
    }
    
?>
