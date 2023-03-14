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
    <li> <a href='themsp.php'>Thêm sản Phẩm</a></li>
    <li> Danh mục</li>
   </ul>
   </div>
</ul>
<ul id='menuql'>
      <li class='li'>Quản Lý Tài Khoản</li>
      <div id='lksp'>
      <ul>
      <li><a href='danhsachtk.php'> Danh Sách Tài Khoản</a></li>
      <li><a href='themtk.php'> Thêm Tài khoản</a></li>
      <li> <a href='mytk.php'>Tài Khoản Của Tôi</a></li>
     </ul>
     </div>
      </ul>
      <ul id='menuql'>    <li class='li'>Quản Lý Đơn Hàng</li>
      <div id='lksp'>
      <ul>
      <li> <a href='danhsachdh.php'>Danh Sách Đơn Hàng</a></li>
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
    <p style="border-left:1px solid gray;border-left-color:rgba(105, 185, 144, 0.53);height:20px;    box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.4);padding:10px;margin-left:10px;border-left-width:5px;  text-align:left">Quản lý sản phẩm / Danh mục </p>
        <h3> Danh sách danh mục</h3>
       
        <hr width="1000px">
       <span style="float:left;margin-left: 60px;margin-top:20px;margin-bottom:20px"> <i class="fa-solid fa-magnifying-glass"></i> Tìm kiếm: <input type="text" id="tim" size="40" placeholder="Nhập từ khóa hoặc mã danh mục" onkeyup="searchfunc()" ></span> 
       
          <a id="themsp" onclick="functhem()" > <i class="fa-solid fa-plus"></i> Thêm mới</a>
        <div id='dmthem'></div>

         <table  style="width:95%;margin-top:30px;margin-left:50px;margin-bottom:50px">
         <tr style="background-color:rgba(105, 185, 144, 0.53);color:white">
         <th>STT</th>
            <th>Mã danh mục</th>
            <th>Tên danh Mục</th>
            <th>Thao Tác</th>
</tr>
<?php

require 'connection.php';
$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

$sql = "SELECT * FROM danhmuc ";
$result = $conn->query($sql);
$stt=0;

if ($result->num_rows > 0) {
    // output dữ liệu trên trang
    while($row = $result->fetch_assoc()) {
      $stt++;
        echo " 
        <tr id='viewsp'> <td style='text-align:center'>
        ".$stt." 
        </td>
              <td style='text-align:center'>
             #". $row['id']." 
             </td>
           
             <td  style='text-align:center' id='canchinh'>
             ".$row['tendanhmuc']." 
           </td>
       
        
     
        <td style='text-align:center; padding-top:15px;padding-bottom:15px'>
        
        <button id='chinh'  class='sua' value=' ". $row['id']."'  onclick='showCustomer(this.value)' >   <i class='fa-solid fa-pen'>    </i></button>
     
       
    
     
   
        <br><br>
        <a href='xoadm.php?action=xoa&id=".$row['id']."&return_url=".$current_url."'><i class='fa-solid fa-trash-can'></i></a>
        </td>
 
           </tr>
              ";     
              
           
    }
    
  }  else {
      echo "0 results";
    }
    
$conn->close();


?>

</table>

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
  xhttp.open("GET", "suadm.php?q="+str);
  xhttp.send();

}

document.getElementById("chin").onclick=function(){huy()};
  function huy(){
    document.getElementById("dmthem").innerHTML = "";
  }

  function functhem(str){
    const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("dmthem").innerHTML = this.responseText;
  }
  xhttp.open("GET", "themdm.php?q="+str);
  xhttp.send();
  }


function searchfunc(){
  let tim=document.querySelector('#tim');
  let view=Array.from(document.querySelectorAll('#viewsp'));

  //ẩn hiện
  view.forEach(function(el){
    let text=el.innerText;
    if(text.indexOf(tim.value)>-1)
    el.style.display="";
    else el.style.display="none";
  })
}



</script>
    </div>
    <?php } else{
      echo"  <p style='color:red;font-size:100px;float:left;position:fixed'><i class='fa-solid fa-circle-exclamation'></i> TÉO TEO TEO TÈO TEO TÈO TÈO TEO TEO TÉOOOO!!!</p>";
    }?>
</body>
</html>