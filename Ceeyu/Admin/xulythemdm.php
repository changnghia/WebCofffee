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
    require 'connection.php';
    if(isset($_POST['themdm'])){
        $id=$_POST['id'];
        $tendm=$_POST['tendm'];
    $sql="INSERT INTO danhmuc VALUE($id,N'$tendm')";
    
    $sql_s="SELECT * from danhmuc where id='$id'";
    $result=mysqli_query($conn,$sql_s);
    if($result){
    if(mysqli_num_rows($result)>0)
    {
        echo"<div id='khungthongbao1'>
        <div id='thongbao1'>
            <p><i class='fa-solid fa-circle-exclamation'></i> Mã danh mục đã tồn tại.</p>
            <a href='http://localhost/CEEYU/Admin/danhmuc.php'>OK!</a>
        </div>
    </div>";
        exit;
    }

}

$sql_ten="SELECT * from danhmuc where tendanhmuc='$tendm'";
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

    if($conn->query($sql)===TRUE){
        echo"<div id='khungthongbao1'>
        <div id='thongbao1'>
            <p style='color:rgb(106, 226, 144);'><i class='fa-solid fa-circle-check'></i> Thêm thành công!!!</p>
            <a href='http://localhost/CEEYU/Admin/danhmuc.php'>OK!</a>
        </div>
    </div>";
    }
    else{
        Echo "lỗi";
    }

    }
?>