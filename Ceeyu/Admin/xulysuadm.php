<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="css/qtv.css">
    <link rel="icon" href="http://localhost/CEEYU/image/Ceeyulogo-1.png">
    <link rel="stylesheet" type="text/css" href="font-icon/css/all.css">
</head>
<body>
    
</body>
</html>
<?php 
    include("connection.php"); 
    
    if (isset($_POST['capnhatdm'])){
    
      $id=$_POST['id'];
      $tendanhmuc=$_POST['tendm'];

      $sql_ten="SELECT * from danhmuc where tendanhmuc='$tendanhmuc'";
      $result_s=mysqli_query($conn,$sql_ten);
      if($result_s){
      if(mysqli_num_rows($result_s)>0)
      {
          echo"<div id='khungthongbao1'>
          <div id='thongbao1'>
              <p><i class='fa-solid fa-circle-exclamation'></i> Tên danh mục đã tồn tại.</p>
              <a href='http://localhost/CEEYU/Admin/danhmuc.php'>OK!</a>
          </div>
      </div>";
          exit;
      }
    }
        
$sql = "UPDATE `danhmuc` SET tendanhmuc='$tendanhmuc' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
header('Location: http://localhost/CEEYU/Admin/danhmuc.php');
} else {
echo "Error updating record: " . $conn->error;
}
$conn->close();

    
}

?> 

