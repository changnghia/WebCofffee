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
    <li><a href='danhsach.php'> Danh Sách sản Phẩm</a></li>
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
      <li><a href='themtk.php'> Thêm Tài khoản</a></li>
      <li> <a href='mytk.php'>Tài Khoản Của Tôi</a></li>
     </ul>
     </div>
      </ul>
      <ul id='menuql'>    <li class='li'style='  background-color: rgba(255, 255, 255, 0.53) ;
      border-radius: 25px;
      width:240px;
      margin-left:0px;
     '>Quản Lý Đơn Hàng</li>
      <div id='lksp'>
      <ul>
      <li > Danh Sách Đơn Hàng</li>
      <li> Thêm Đơn Hàng</li>
     </ul>
     </div>
      </ul>
      <ul id='menuql'>  <li class='li'><a href='thongke.php'>Doanh Thu</a></li></ul>
      <ul id='menuql'>  <li class='li'> <a href='doimk.php'>Đổi Mật Khẩu</a></li></ul>
    
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
    <p style="border-left:1px solid gray;border-left-color:rgba(105, 185, 144, 0.53);height:20px;    box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.4);padding:10px;margin-left:10px;border-left-width:5px;  text-align:left">Quản lý đơn hàng / Danh sách đơn hàng </p>
        <h3> Danh sách đơn hàng</h3>
       
        <hr width="1000px">
       <span style="float:left;margin-left: 60px;margin-top:20px;margin-bottom:20px"> <i class="fa-solid fa-magnifying-glass"></i> Tìm kiếm: <input size="40" type="text" id="tim" placeholder="Nhập tên khách hàng hoặc mã đơn hàng" onkeyup="searchfunc()" ></span> 
        <span style="position:absolute;margin-top:25px;margin-left:-170px">Hiển thị theo trạng thái : <select id="timmuc"   onclick="search()" >
        <option></option>
        <option>Chờ xác nhận</option>
        <option >Đang chuẩn bị hàng</option>
        <option>Đang giao</option>
        <option>Hoàn Thành</option>
        <option>Đã hủy</option>
        

        </select>  </span>   <a id="themsp" href=""> <i class="fa-solid fa-plus"></i> Thêm mới</a>
   
        <div id='txtHint'></div>
        <div id="over">
         <table  style="width:160%;margin-top:30px;margin-left:50px;margin-bottom:50px">
         <tr style="background-color:rgba(105, 185, 144, 0.53);color:white">
         <th>STT</th>
            <th>Mã đơn hàng</th>
            <th>Tên Khách Hàng</th>
            <th>Ngày đặt</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Tổng</th>
            <th>Ghi chú</th>
            <th>Thanh Toán</th>
            <th>Trạng Thái</th>
          <th>Đơn Hàng</th>
</tr>
<?php

require 'connection.php';
$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

$sql = "SELECT * FROM donhang  ORDER BY id DESC";
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

             <td id='canchinh'style='text-align:left'>
             ".$row['tenkh']." 
           </td>
           <td style='text-align:center'>
           ".$row['ngaydat']." 
         </td>
         <td style='text-align:center'>
         ".$row['sdt']." 
       </td>
       <td style='text-align:center'>
       ".$row['email']." 
     </td>
         <td style='text-align:left;width:250px'>
        ".$row['diachi']."
       </td>
         <td style='text-align:center'>
         ".$row['tong']." VNĐ
       </td>
       <td style='width:250px'>
       ".$row['ghichu']."
      </td>
       <td style='text-align:center'>
";?>    <?php
       if($row['thanhtoan']==='Momo'){

        echo "<p id='momo'>".$row['thanhtoan']."</p>";
       }
       else{
        if($row['thanhtoan']==='Tiền mặt'){
        echo "<p id='tienmat'>".$row['thanhtoan']."</p>";
    }else{
      if($row['thanhtoan']==='Chuyển Khoản'){
        echo "<p id='chuyenkhoan'>".$row['thanhtoan']."</p>";
      }
      else{
        echo "";
      }
    }
       }
       ?><?php
       echo "
     </td>
       <td >       ";?><?php
       if($row['trangthai']==='Chờ xác nhận'){
       echo" 
       <button id='chinh'  class='suatt' value=' ". $row['id']."'  onclick='showCustomer(this.value)' >   <i class='fa-solid fa-pen'>    </i></button>
       <p id='ttxn'>".$row['trangthai']."</p>
       
       ";
       }else{
        if($row['trangthai']==='Đang chuẩn bị hàng'){
            echo" 
            <button id='chinh'  class='suatt' value=' ". $row['id']."'  onclick='showCustomer(this.value)' >   <i class='fa-solid fa-pen'>    </i></button>
            <p id='ttcb'>".$row['trangthai']."</p>
            ";
        }
        else{
            if($row['trangthai']==='Đang giao'){
                echo" 
                <button id='chinh'  class='suatt' value=' ". $row['id']."'  onclick='showCustomer(this.value)' >   <i class='fa-solid fa-pen'>    </i></button>
                <p id='ttdg'>".$row['trangthai']."</p>
                ";
            }else{
                if($row['trangthai']==='Hoàn Thành'){
                echo "    <p id='ttht' >".$row['trangthai']."</p>";
            }
            else{
                if($row['trangthai']==='Đã hủy'){
                    echo "    <p id='ttxn' >".$row['trangthai']."</p>";
                } 
                else{
                    echo "";
                }
            }
        }
        }
       } ?>
     <?php 
     echo "
     </td>
     <td>
   <button id='viewdh'   value=' ". $row['id']."'  onclick='showdh(this.value)' >   Xem đơn hàng  </button>
   </td>
      
 
           </tr>
              ";     
              
           
    }
    
  }  else {
      echo "<br><br><br>
      <br><p>Không có đơn hàng</p>";
    }
    
$conn->close();


?>

</table>
</div>
<script>

function showCustomer(str) {
  if (str == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("txtHint").innerHTML = this.responseText;
  }
  xhttp.open("GET", "suatt.php?q="+str);
  xhttp.send();

}
function showdh(str) {
  if (str == 0) {
    document.getElementById("txtHint").innerHTML = "aaaaaaaaaaaaa";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("txtHint").innerHTML = this.responseText;
  }
  xhttp.open("GET", "showdh.php?q="+str);
  xhttp.send();

}


document.getElementById("chin").onclick=function(){huy()};
  function huy(){
    document.getElementById("txtHint").innerHTML = "";
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

function search(){
  let tim=document.querySelector('#timmuc');
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