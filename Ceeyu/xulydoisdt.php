<?php
    include 'connection.php';
    if(isset($_POST['thaydoiphone'])){
        $phone=$_POST['phonenew'];
        $id=$_POST['iduser'];
        $sql="UPDATE member set phone='$phone' where id=$id";
        if($conn->query($sql)===TRUE){
            header('Location: http://localhost/CEEYU/doisdt.php');
            

        }
    }
            
?>
    
            