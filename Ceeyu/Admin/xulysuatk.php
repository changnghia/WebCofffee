<?php 
    include("connection.php"); 
    mysqli_set_charset($conn, 'UTF8');
    if (isset($_POST['capnhat']) && isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];

        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_parts =explode('.',$_FILES['image']['name']);
        $file_ext=strtolower(end($file_parts));
        $expensions= array("jpeg","jpg","png");

      $id=$_POST['id'];
      $ten=$_POST['ten'];
      $username=$_POST['username'];
      $password=$_POST['password'];
      $phone1=$_POST['phone1'];
      $email=$_POST['email'];
      $gender=$_POST['gender'];
      $data=$_POST['data'];
      $address=$_POST['address'];
      
      if (!$file_name )
      {

    $sql = "UPDATE `member` SET ten='$ten', username='$username', password='$password', phone='$phone1', email='$email', gender='$gender', data='$data', address='$address' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
    header('Location: http://localhost/CEEYU/Admin/danhsachtk.php');
    } else {
    echo "Error updating record: " . $conn->error;
    }
    $conn->close();
    
        
      }
      else{
          if(in_array($file_ext,$expensions)=== false){
        $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
        }
        $image = $_FILES['image']['name'];
        $target = 'C:/xampp/htdocs/CEEYU/image/'.basename($image);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
$sql = "UPDATE `member` SET ten='$ten', avt='$image', username='$username', password='$password', phone='$phone1', email='$email', gender='$gender', data='$data', address='$address' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
header('Location: http://localhost/CEEYU/Admin/danhsachtk.php');
} else {
echo "Error updating record: " . $conn->error;
}
$conn->close();

    }
}
}else{
    echo "adasd";
}
?> 

