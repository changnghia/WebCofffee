<?php
    include 'connection.php';
    if(isset($_POST['thaydoiuser'])){
        $password=$_POST['password'];
        $id=$_POST['iduser'];
        $sql="UPDATE member set password='$password' where id=$id";
        if($conn->query($sql)===TRUE){
            header('Location: http://localhost/CEEYU/doimkuser.php');
            

        }
    }
            
?>
    
            