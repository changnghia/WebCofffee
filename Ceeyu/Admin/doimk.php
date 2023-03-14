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
      <li class='li'>Quản Lý Sản Phẩm</li>
   
    <div id='lksp'>
    <ul>
    <li> <a href='danhsach.php'> Danh Sách sản Phẩm</li>
    <li> <a href='themsp.php'>Thêm sản Phẩm</a></li>
    <li> <a href='danhmuc.php'>Danh mục</a></li>
   </ul>
   </div>
</ul>
<ul id='menuql'>
      <li class='li'>Quản Lý Tài Khoản</li>
      <div id='lksp'>
      <ul>
      <li><a href='danhsachtk.php'> Danh Sách Tài Khoản</a></li>
      <li> <a href='themtk.php'>Thêm Tài khoản</a></li>
      <li>Tài Khoản Của Tôi</li>
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
      <ul id='menuql'>  <li class='li' style='  background-color: rgba(255, 255, 255, 0.53) ;
      border-radius: 25px;
      width:240px;
      margin-left:0px;
     '><a href='doimk.php'>Đổi Mật Khẩu</a></li></ul>
    
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
    <p style="border-left:1px solid gray;border-left-color:rgba(105, 185, 144, 0.53);height:20px;    box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.4);padding:10px;margin-left:10px;border-left-width:5px;  text-align:left">Đổi mật khẩu </p>
        <h3>Đổi mật khẩu</h3>
       
        <hr width="1000px">

  <br>
  <br>
<form name="f1"method="POST" onsubmit="return matchpass()"  acction="doimk.php" class="doimk">
<?php
    include 'connection.php';
    $sql="SELECT*FROM member where id=1 ";
    $result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
      echo "   <input type='hidden' name='passss2'  value='".$row['password']."'>";
    }
    
    ?> 
    <input type="password" id="mkhientai" name="mkhientai"  placeholder="Mật khẩu hiện tại">
    <div style="color:red" id="checkmk"> </div>
    <input type="password" id="passnew" name="password"placeholder="Mật khẩu mới"><br>
    <div style="color:red" id="checkcc"></div>
    <input type="password"  id="password2" name="password2" placeholder="Xác nhận mật khẩu mới"><br>
    <div style="color:red" id="check"> </div><br>
    <input type='submit' class="buttondoimkad" name="thaydoi" value='THAY ĐỔI' /> 
    <?php require 'xulydoimk.php' ?>
</form>


  </div>
  <script>


function showCustomer(str) {
  if (str == 0) {
    document.getElementById("dmthem").innerHTML = "aaaaaaaaaaaaa";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("dmthem").innerHTML = this.responseText;
  }
  xhttp.open("GET", "suamytk.php?q="+str);
  xhttp.send();

}

  function matchpass(){  
var firstpassword=document.f1.password.value;  
var secondpassword=document.f1.password2.value;  
var password1=document.f1.passss2.value;  
var password2=document.f1.mkhientai.value; 
let chucai=/[a-z]/;
let chuso=/\d/;

if(firstpassword.length>=8){
  document.getElementById("passnew").style.borderColor="gray";
    document.getElementById("checkcc").innerHTML = "";
    if(chucai.test(firstpassword)){
      document.getElementById("passnew").style.borderColor="gray";
    document.getElementById("checkcc").innerHTML = "";
    if(chuso.test(firstpassword)){
      document.getElementById("passnew").style.borderColor="gray";
    document.getElementById("checkcc").innerHTML = "";
if(password1==password2){
  document.getElementById("mkhientai").style.borderColor="gray";
    document.getElementById("checkmk").innerHTML = "";
if(firstpassword==secondpassword){  
  document.getElementById("password2").style.borderColor="gray";
  document.getElementById("check").innerHTML = "";
return true;  
}  
else{  
  document.getElementById("password2").style.borderColor="red";
    document.getElementById("check").innerHTML = "Mật khẩu không giống nhau.";
  
return false;  
}
  } else{
    document.getElementById("mkhientai").style.borderColor="red";
    document.getElementById("checkmk").innerHTML = "Mật khẩu không chính xác.";
    return false;
  }
}else{
  document.getElementById("passnew").style.borderColor="red";
    document.getElementById("checkcc").innerHTML = "Mật khẩu phải chứa ít nhất một chữ số";
    return false;
}

}
else{
  document.getElementById("passnew").style.borderColor="red";
    document.getElementById("checkcc").innerHTML = "Mật khẩu phải chứa ít nhất một chữ cái";
    return false;
}

}


else{
  document.getElementById("passnew").style.borderColor="red";
    document.getElementById("checkcc").innerHTML = "Mật khẩu không hợp lệ. Mật khẩu cần có trên 8 ký tự, chứa ít nhất một chữ cái và một chữ số.";
  return false;
}


}


</script>

    </div>
    <?php } else{
      echo"  <p style='color:red;font-size:100px;float:left;position:fixed'><i class='fa-solid fa-circle-exclamation'></i> TÉO TEO TEO TÈO TEO TÈO TÈO TEO TEO TÉOOOO!!!</p>";
    }?>
</body>
</html>