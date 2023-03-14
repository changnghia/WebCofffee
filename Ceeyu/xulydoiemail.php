<?php
    include 'connection.php';
    if(isset($_POST['thaydoiemail'])){
        $email=$_POST['emailnew'];
        $id=$_POST['iduser'];
        $sql="UPDATE member set email='$email' where id=$id";
        if($conn->query($sql)===TRUE){
            header('Location: http://localhost/CEEYU/doiemail.php');
            

        }
    }
            
?>
    
            