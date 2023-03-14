<?php 
    include("connection.php"); 
    
    if (isset($_POST['capnhat']) && isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];

        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_parts =explode('.',$_FILES['image']['name']);
        $file_ext=strtolower(end($file_parts));
        $expensions= array("jpeg","jpg","png");

      $id=$_POST['id'];
      $tensp=$_POST['tensp'];
      $loaisp=$_POST['loaisp'];
      $mota=$_POST['mota'];
      $sluong=$_POST['sluong'];
      $gia=$_POST['gia'];
      if (!$file_name )
      {

    $sql = "UPDATE `sanpham` SET tensp='$tensp', loaisp='$loaisp', gia='$gia', mota='$mota', sluong='$sluong' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
    header('Location: http://localhost/CEEYU/Admin/danhsach.php');
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
$sql = "UPDATE `sanpham` SET tensp='$tensp', loaisp='$loaisp', gia='$gia', mota='$mota',image='$image',sluong='$sluong' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
header('Location: http://localhost/CEEYU/Admin/danhsach.php');
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

