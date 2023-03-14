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
      <li class='li' >Quản Lý Sản Phẩm</li>
   
    <div id='lksp'>
    <ul>
    <li> <a href='danhsach.php'>Danh Sách sản Phẩm</a></li>
    <li> <a href='themsp.php'> Thêm sản Phẩm</a></li>
    <li><a href='danhmuc.php'> Danh mục</a></li>
   </ul>
   </div>
</ul>
<ul id='menuql'>
      <li class='li'style='  background-color: rgba(255, 255, 255, 0.53) ;
      border-radius: 25px;
      width:240px;
      margin-left:0px;
     '>Quản Lý Tài Khoản</li>
      <div id='lksp'>
      <ul>
      <li> <a href='danhsachtk.php'>Danh Sách Tài Khoản</a></li>
      <li> Thêm Tài khoản</li>
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
    <p style="border-left:1px solid gray;border-left-color:rgba(105, 185, 144, 0.53);height:20px;    box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.4);padding:10px;margin-left:10px;border-left-width:5px;  text-align:left">Quản lý tài khoản / Thêm tài khoản </p>
        <h3> Thêm tài khoản</h3>
       
        <hr width="1000px">

        <form id="khungthem" action="themtk.php" method="POST" enctype="multipart/form-data">

    <div id="themimage"><img src="" id="image"  width="300px" height="400px"></div>    
   <div id="Filechinh"> <input type="file" name="image" id="imageFile" onchange="chooseFile(this)" > </div>
        <div id="addsp">
           
           <input placeholder="Họ và tên" type="text" name="ten" id="ten" class="form-control"  />
   
         
           <input placeholder="Tên đăng nhập" type="text" name="username" id="username" class="form-control" />
         
          
           <input placeholder="Mật khẩu" type="password" name="password" id="password"class="form-control" minlength="7"/>
  
           <input placeholder="Nhập lại mật khẩu" type="password" name="password2" id="password2" class="form-control" minlength="7"/>
    
           <input  name="phone" class="form-control"id="phone"type="text" placeholder="Số điện thoại" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  maxlength='11'required>

        

           <input placeholder="Email" type="email" name="email" id="email" class="form-control"  />
       <br>

      <select name="gender"style="margin-top:-20px;margin-left:-220px;width:170px;height:30px;text-align:center;position:absolute;">
                <option >- - Giới tính - -</option>
                <option > Male </option>
                <option >Female </option>
    
            </select>
            <div id="desdate">
     <span style="position:absolute;margin-left:-70px;font-size:14px;margin-top:8px">Ngày sinh</span> <input type="date" name="data" id="data" class="form-control"  />

      
          
</div>
<input style="margin-left:-220px;margin-top:-25px;position:absolute;" placeholder="Địa chỉ"  type="text" name="address" id="address" class="form-control"  />
            <br>
       <button id="reset"type="reset">Reset</button> <button name="xulythemtk" id="btnaddsp"><i class="fa-solid fa-plus"></i> Thêm tài khoản</button>
</div>
<?php require "xulythemtk.php"?>
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