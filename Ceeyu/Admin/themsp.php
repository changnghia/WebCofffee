<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="css/qtv.css">
    <link rel="icon" href="http://localhost/CEEYU/image/Ceeyulogo-1.png">
    <link rel="stylesheet" type="text/css" href="font-icon/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Quản Trị Viên</title>
</head>
<body>
    <div id="menu">
        <div>
        <?php
    session_start(); 
$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
if(isset($_SESSION['ten'])&& $_SESSION['id']==1){
echo " <b id='tentk' ><p>DoanCs2</p><p>Xin chào Administrator</p>
    <p id='avt'><img src='http://localhost/CEEYU/image/Ceeyulogo-1.png'   width='80px' ></p>
    <p> " .$_SESSION['ten'] . "</p>
      <hr style='width:250px'>
      <ul id='menuql'>  <li class='li'><a href='http://localhost/CEEYU/index.php '>Home</a></li></ul>
      <ul id='menuql'>
      <li class='li' style='  background-color: rgba(255, 255, 255, 0.53) ;
    border-radius: 25px;
    width:240px;
    margin-left:0px;
   '>Quản Lý Sản Phẩm</li>
   
    <div id='lksp'>
    <ul>
    <li> <a href='danhsach.php'>Danh Sách sản Phẩm</a></li>
    <li> Thêm sản Phẩm</li>
    <li><a href='danhmuc.php'> Danh mục</a></li>
   </ul>
   </div>
</ul>
<ul id='menuql'>
      <li class='li'>Quản Lý Tài Khoản</li>
      <div id='lksp'>
      <ul>
      <li> <a href='danhsachtk.php'>Danh Sách Tài Khoản</a></li>
      <li><a href='themtk.php'> Thêm Tài khoản</a></li>
      <li> <a href='mytk.php'>Tài Khoản Của Tôi</a></li>
     </ul>
     </div>
      </ul>
      <ul id='menuql'>    <li class='li'>Quản Lý Đơn Hàng</li>
      <div id='lksp'>
      <ul>
      <li><a href='danhsachdh.php'> Danh Sách Đơn Hàng</a></li>
      <li> Thêm Đơn Hàng</li>
     </ul>
     </div>
      </ul>
      <ul id='menuql'>  <li class='li'><a href='thongke.php'>Doanh Thu</a></li></ul>
      <ul id='menuql'>  <li class='li'><a href='doimk.php'>Đổi Mật Khẩu</a></li></ul>
    
</b>  ";



?>
        </div>
    </div>
    <div id="test">
    <?php

$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
if(isset($_SESSION['ten'])){
echo "
     
      <a href='logout.php'><i style='font-size:20px' class='fa-solid fa-arrow-right-from-bracket'></i> Đăng Xuất</a>
     
  ";
}

?>
    </div>
    <div id="work">
    <p style="border-left:1px solid gray;border-left-color:rgba(105, 185, 144, 0.53);height:20px;    box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.4);padding:10px;margin-left:10px;border-left-width:5px;  text-align:left">Quản lý sản phẩm / Thêm sản phẩm </p>
        <h3> Thêm sản phẩm</h3>
       
        <hr width="1000px">

        <form id="khungthem" action="themsp.php" method="POST" enctype="multipart/form-data">

    <div id="themimage"><img src="" id="image"  width="300px" height="400px"></div>    
   <div id="Filechinh"> <input type="file" name="image" id="imageFile" onchange="chooseFile(this)" > </div>
        <div id="addsp">
  
            <input type="text" placeholder="*Mã sản phẩm" name="id"  required>
            
            <input type="text" placeholder="*Tên sản phẩm" name="tensp" required>
            <br>
            <input type="text" placeholder="*Giá(Vd:25.000)" name="gia"required>
            
            <input type="text" placeholder="Mô tả" name="mota">
            <br>
            <select  name="loaisp" style="margin-right:50px;width:170px;height:30px;text-align:center">
                <option disabled>- - Chọn danh mục - -</option>
                <?php
                require 'connection.php';
$sql_s = "SELECT * FROM danhmuc";
$result = $conn->query($sql_s);
while($row = $result->fetch_assoc()) {
echo "<option>".$row['tendanhmuc']."</option> 


  ";
}?>
            </select>
           
            <input type="text" placeholder="Tồn kho" name="sluong"><br>
       <button id="reset"type="reset">Reset</button> <button name="xulythem" id="btnaddsp"><i class="fa-solid fa-plus"></i> Thêm sản phẩm</button>
</div>
<?php require "xulythem.php"?>
</form>
    </div>
    
    <script>
   function chooseFile(fileInput){

        var reader = new FileReader();
        reader.onload = function(e){
            $('#image').attr('src',e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    

   }
</script>
<?php } else{
      echo"  <p style='color:red;font-size:100px;float:left;position:fixed'><i class='fa-solid fa-circle-exclamation'></i> TÉO TEO TEO TÈO TEO TÈO TÈO TEO TEO TÉOOOO!!!</p>";
    }?>
</body>
</html>