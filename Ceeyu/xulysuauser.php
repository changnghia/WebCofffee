<?php 
    include 'connection.php'; 
    mysqli_set_charset($conn, 'UTF8');
    if (isset($_POST['suaprofile'])){
        $errors= array();
        $file_name = $_FILES['avt']['name'];
        $file_tmp = $_FILES['avt']['tmp_name'];
        $file_type = $_FILES['avt']['type'];
        $file_parts =explode('.',$_FILES['avt']['name']);
        $file_ext=strtolower(end($file_parts));
        $expensions= array("jpeg","jpg","png");

      $id=$_POST['iduser'];
      $ten=$_POST['ten'];
      $gender=$_POST['gender'];
      $data=$_POST['data'];
      $address=$_POST['address'];
      
      if (!$file_name )
      {

    $sql = "UPDATE `member` SET ten='$ten', gender='$gender', data='$data', address='$address' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: http://localhost/CEEYU/mytk.php');
    } else {
    echo "Error updating record: " . $conn->error;
    }
    $conn->close();
    
        
      }
      else{
          if(in_array($file_ext,$expensions)=== false){
        $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
        }
        $image = $_FILES['avt']['name'];
        $target = 'C:/xampp/htdocs/CEEYU/image/'.basename($image);
        if (move_uploaded_file($_FILES['avt']['tmp_name'], $target)) {
$sql = "UPDATE `member` SET ten='$ten', avt='$image', gender='$gender', data='$data', address='$address' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    $_SESSION['avt']=$image;
    header('Location: http://localhost/CEEYU/mytk.php');
} else {
echo "Error updating record: " . $conn->error;
}
$conn->close();

    }
}
}else{
    echo "";
}
?> 

