
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/Ceeyulogo-1.png">
    <link rel="stylesheet"  href="css/apcss.css">
   
    
    <title>Cart-DoanCs2</title>
    <link rel="stylesheet" type="text/css" href="font-icon/css/all.css">
  
</head>
<body>
   
    <div id="header">
        <nav class="container">
            <a href="index.php" id="logo">
                <img src="image/Ceeyulogo-1.png" height="70px" width="100px" alt="Ceeyu-Coffe">
            </a>
        <ul id="menu">
        <li><a href="map.php">VỊ TRÍ</a></li>  
        <li><a href="index.php">TRANG CHỦ</a></li>
            <li id="hovermenuplus"><a href="Menu.php?action=menu&dm=Cà phê Phin giấy"  >THỰC ĐƠN</a>
            <ul id="menuplus">
              <?php 
                include 'connection.php';
                $sql="SELECT*FROM danhmuc";
                $result=$conn->query($sql);
                while($row=$result->fetch_assoc()){
                  echo "<li><a href='Menu.php?action=menu&dm=".$row['tendanhmuc']."' id='limenuplus'><i style='font-size:17px' class='fa-solid fa-caret-right'></i> ".$row['tendanhmuc']."</a></li> ";
                }
              ?>
            

              
              
              
            </ul>
          
          </li>
          
            <li><a href="#">TIN TỨC</a>
          
          
          </li>
            <li><a href="About.php">GIỚI THIỆU</a></li>
            <div id="GioHang" >
           
            <?php 
  require 'xulycard.php';
  if(isset($_SESSION['cart'])){ 
        
      $sql="SELECT * FROM sanpham WHERE id in ("; 
        
      foreach($_SESSION['cart'] as $id => $value) { 
          $sql.=$id.","; 
      } 
    $tongsl='0';
      $sql=substr($sql, 0, -1).")"; 
      $query=$conn->query($sql); 
      
      
      
      while($row=$query->fetch_array()){ 

           $tongsl=$tongsl+ $_SESSION['cart'][$row['id']]['quantity'];
           ?>
            
    <?php    }
        
    
  ?>    
 <p id="soluong"><?php echo " $tongsl ";?></p>
<?php        
} else{
 echo "<p id='soluong'>0</p>";
}
      ?>
                <p style="font-size: 33px;margin-top: -10px;margin-left: -20px;"><a href="card.php"><i class="fa-solid fa-bag-shopping" style="font-size:30px;color: rgb(83, 117, 101);"></i> </a></p>
                <ul id="viewcard">
                    <li><a href="" style=" font-family:'Times New Roman', Times, serif;font-size:20px;color:black;margin-top:-25px;margin-left:-30px;">GIỎ HÀNG</a></li>
           
                    <?php 

  if(isset($_SESSION['cart'])){ 
        
      $sql="SELECT * FROM sanpham WHERE id in ("; 
        
      foreach($_SESSION['cart'] as $id => $value) { 
          $sql.=$id.","; 
      } 
    $tongsl='0';
      $sql=substr($sql, 0, -1).")"; 
      $query=$conn->query($sql); 
      
      
      
      while($row=$query->fetch_array()){ 

           $tongsl=$tongsl+ $_SESSION['cart'][$row['id']]['quantity'];
           ?>
            
    <?php    }
        
    
  ?>    
 <p>You have<span style="color:rgb(244, 83, 91);"><?php echo " $tongsl mặt hàng ";?></span>in your bag</p>
<?php        
}else{ 
    
     
          
    }
     
   
      ?>

<?php 
$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
  if(isset($_SESSION['cart'])){ 
        
      $sql="SELECT * FROM sanpham WHERE id IN ("; 
        
      foreach($_SESSION['cart'] as $id => $value) { 
          $sql.=$id.","; 
      } 
    $total='0';
    $tong='0';
      $sql=substr($sql, 0, -1).") ORDER BY id asc"; 
      $query=$conn->query($sql); 
      
      
      
      while($row=$query->fetch_array()){ 
      
           $tong=$row['gia']* $_SESSION['cart'][$row['id']]['quantity'];
           $total=$total+$tong;
      ?> 
          <p><?php echo " <a id='lksp' href='Chitiet.php?action=hienthi&id=".$row['id']."'>".$row['tensp']."</a> " ?> <b style="float:right;"><?php echo "".$row['gia']."₫ " ?><?php  echo "<span class='remove-itm'><a id='remove' href='delete.php?action=delete&id=".$row['id']."&return_url=".$current_url."'>&times;</a></span>"
       ?> </b>(x<?php echo  $_SESSION['cart'][$row['id']]['quantity']  ?>)</p> 
         <hr>
            
    <?php 
           
      } 
     
  ?> 
 


</p>
    <p><b style="color:rgb(100, 100, 100);">Subtotal: </b> <b style="float:right;font-size:19px;color:rgb(100, 100, 100);"> <?php echo $total ?>.000₫</b></p>
     <p id="buttonxemgiohang" > <a href="card.php" id='lkxemgiohang' >XEM GIỎ HÀNG</a> </p>
     <p id="buttonxemthanhtoan" > <a href="card.php" id='lkxemthanhtoan' >THANH TOÁN</a> </p>
  <?php 
        
  }else{ 
    echo"<img src='image/carttrong.png' style=' margin-left:60px' height='80px' width='100px' alt='Không có sản phẩm'>";
      echo "<p>Your Cart is empty. Please add some products.</p>"; 
        
  }
   
 
    ?>
  
  

                  </ul>
</div>
<div id="login">
<?php

$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
if(isset($_SESSION['ten'])&&($_SESSION['id']==1)){
echo "  <p id='avt'><img src='http://localhost/CEEYU/image/".$_SESSION['avt']."'   width='25px' ></p> <b id='tentk' >" .$_SESSION['ten'] . "
      <ul id='viewtk'>
    
      <li><a href='http://localhost/CEEYU/Admin/danhsach.php'>Administrator</a></li>
      <li><a href='login/logout.php?return_url=".$current_url."'>Đăng Xuất</a></li>
      </ul>
</b>  ";

}else {
  if(isset($_SESSION['ten'])&&$_SESSION['id']>1){
  echo "  <p id='avt'><img src='http://localhost/CEEYU/image/".$_SESSION['avt']."'   width='25px' ></p> <b id='tentk' >" .$_SESSION['ten'] . "
  <ul id='viewtk'>
  <li><a href='mytk.php'>Tài Khoản Của Tôi</a></li>
  <li><a href=''>Đơn mua</a></li>
  <li><a href='login/logout.php?return_url=".$current_url."'>Đăng Xuất</a></li>
  </ul>
</b>  ";
}
else{
  echo "<a href='register/register.php'>Register </a>";
  echo "<a style='color:white'>| </a>";
echo "<a href='login/login.php'>Login</a>";

}
}
?>
<?php
  if(isset($_SESSION['ten'])){
    echo"";
  }else{
    header('location:http://localhost/CEEYU/index.php');
  }
?>
      </div>
        </ul>
        </nav>
    </div>
    <div id="mess">
  <button id="Mymess" class="btnmymess" > <i class="fa-solid fa-comment" style="font-size:35px"></i>
</button>
  <form id="loinhan" class="btnloinhan">
  <p style="color:white;text-align:center;width:270px;margin-top:0px">Bạn vui lòng điền vào biểu mẫu dưới đây và chúng tôi sẽ liên hệ lại với bạn ngay khi có thể.</p>
  <ul style="background-color:rgb(230, 229, 229);border-radius:10px;padding-top:10px;height: 410px;width:270px;padding-left:15px">
   <input type="text"placeholder="Nhập tên:..."required >
   <input type="tel" placeholder="Nhập số điện thoại:..." required>
  <input type="email" placeholder="Nhập email của bạn:..."required>
  <p></p>
  <textarea type="text" rows="10"cols="30"placeholder="*Thư..."required></textarea>
  <input type="submit" id="btnguiloinhan" value="&#10148 Hoàn tất" >
</ul> 
</form>
</div>

<script>
  document.getElementById("Mymess").onclick=function(){myfuncmess()};
  function myfuncmess(){
    document.getElementById("loinhan").classList.toggle("show");
  }
</script>
<div id="showthanhtoan"></div>

    <p style="text-align: center;margin-top:100px;font-size: 22px;font-family: 'Times New Roman', Times, serif;"> <?php 
     if(isset($_GET['q'])){
      $iddh=$_GET['q'];
      echo "<a id='backkk' href='http://localhost/CEEYU/donhang.php'><i class='fa-solid fa-chevron-left'></i></a>Đơn hàng của bạn > đơn hàng: #$iddh";
    }else{  echo "Đơn hàng của bạn ";}
    ?></p>
 <hr style="width:700px;"/>

  <nav style="padding-top:100px ;display: inline-block;position:fixed;top:570px ;left: 0px;">
   <p style="background-color: rgb(234, 234, 234);padding-left: 0px;margin-left: 0px;border:1px solid rgb(171, 169, 169) ;border-radius: 90px;width: 245px;height:45px ;"><b  style="font-size: 20pX;color:red;"><img  src="image/hotline.gif" style="margin-top: -20px;border-radius: 50px;width:70px; height: 70px;">0911.47.25.18 </b></p></nav>
 

<div id="khungcart">
  <table style="margin-left:-45px;color:gray;font-family: 'Times New Roman', Times, serif;">
<?php 
$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
include 'connection.php';
      if(isset($_GET['q'])){
        $iddh=$_GET['q'];
        $sql="SELECT*FROM donhang where id=$iddh";
        $result=$conn->query($sql);

        $sql_ct="SELECT*FROM chitietdh where id=$iddh";
        $result_ct=$conn->query($sql_ct);

        
       
        while($row=$result->fetch_assoc()){
        echo " <p style='text-align: center;color:gray;font-size: 22px;font-family: 'Times New Roman', Times, serif;'>Thông tin đơn hàng<br></p>
        <h4 style='text-align: center;color:gray;font-family: 'Times New Roman', Times, serif;'>Mã đơn hàng: #".$row['id']."</h4>
        <p style='text-align: center;color:gray;font-size: 13.5px;font-family: 'Times New Roman', Times, serif;'>Ngày đặt: ".$row['ngaydat']."</p>
        <p style='text-align: center;color:gray;font-size: 13.5px;font-family: 'Times New Roman', Times, serif;'>Trạng thái: <b>".$row['trangthai']."</b><br></p>
        <br><br>
        <div id='thep'>
        <p> Người đặt: ".$row['tenkh']."</p>
        <p> Số điện thoại: ".$row['sdt']."</p>
        <p> Email: ".$row['email']."</p>
        <p> Địa chỉ nhận hàng: ".$row['diachi']."</p>
        <p> Ghi chú: ".$row['ghichu']."</p>
        <p> Tổng: <b>$".$row['tong']."</b></p>
        <p> Phương thức thanh toán: <b>".$row['thanhtoan']."</b></p>
        </div>
        ";
      }
      while($row_ct=$result_ct->fetch_assoc()){
        $sql_sp="SELECT*FROM sanpham where id=".$row_ct['idsp']."";
        $result_sp=$conn->query($sql_sp);
        while($row_sp=$result_sp->fetch_assoc()){
       
              echo "
          
              <div id='thesppp'>
              <img src='http://localhost/CEEYU/image/".$row_sp['image']."' width='80px'>
             <p id='tencuathep'> ".$row_sp['tensp']."</p>
             <p >x".$row_ct['soluong']."</p>
              <p style='margin-left:30px' > $".$row_sp['gia']."</p>
       
              </div><br>

              ";
        }
      }
 
      }
      else{
      $sql="SELECT * FROM donhang WHERE idkh=".$_SESSION['id']." ORDER BY id DESC";  
      $query=$conn->query($sql); 
      $stt=0;
      if($query->num_rows >0){
      while($row=$query->fetch_array()){ 
        $stt++;
      echo "
   
     
      <tr id='dhview'>
      
      <th style='font-size:18px;padding-left:15px;padding-right:15px;border-right:1px solid gray;'>$stt</th>
      <td style='font-size:17px;border-right:1px solid gray'><p style='word-wrap:break-word;width:200px;text-align:center;'> 
      Mã đơn hàng:#".$row['id']."<br>
    <b>".$row['trangthai']."</b><br><br>
    <a id='btnxdhct' href='http://localhost/CEEYU/donhang.php?q=".$row['id']."'>Xem chi tiết</a>
    </p>
      </td>
      <td style='padding-left:20px' ><p style='  word-wrap: break-word;width:350px;'>
     Địa chỉ nhận hàng:<br>
     &nbsp ".$row['diachi']." | ".$row['sdt']."<br><br>
    ".$row['ngaydat']."<br>
      </p>
      </td>
     
      <td ><p style='word-wrap:break-word;width:200px;text-align:center'> ".$row['thanhtoan']."</p></td>
      <th><p style='width:132px;color:green;word-wrap:break-word'>$".$row['tong']."</p></th>

      </tr>
      
      <tr><td colspan='5'><hr></td></tr>
      
      ";
            
  
        
      } 
     
   
        
    }else{ 
  
      echo "<p>You have no orders, please place an order!!</p>"; 
    echo "<p id='back'><a href='index.php'>Quay lại trang chủ</a></p>";
  }
}
 
    ?>
    </table>
 </div>

   <div id="footer">
    <form id="footerbang">
      <table id="footerbang1">
        <th><i class="fa-solid fa-truck" style="font-size:30px;margin-left:05px;margin-top:30px;"></i><p style="margin-left:50px;font-weight:normal;margin-top:-40px;font-size:18px;"><b>MIỄN PHÍ VẬN CHUYỂN</b> <br><i style="font-size:15px;">Đơn hàng từ 80.000VNĐ khu vực Hồ Chí Minh</i></p></th>
        <th><i class="fa-solid fa-rotate" style="font-size:30px;margin-left:30px;margin-top:30px;"></i><p style="margin-left:65px;font-weight:normal;margin-top:-40px;font-size:18px;"><b>ĐỔI TRẢ</b> <br><i style="font-size:15px;">Đổi trả sản phẩm hoặc hoàn tiền(nếu giao sai sản phẩm)</i></p></th>
        <th><i class="fa-solid fa-credit-card" style="font-size:30px;margin-left:30px;margin-top:10px;"></i><p style="margin-left:75px;font-weight:normal;margin-top:-40px;font-size:18px;"><b>THANH TOÁN</b> <br><i style="font-size:15px;">Linh hoạt,hỗ trợ công nợ</i></p></th>
        <th><i class="fa-solid fa-headset" style="font-size:30px;margin-left:30px;margin-top:10px;"></i><p style="margin-left:75px;font-weight:normal;margin-top:-40px;font-size:18px;"><b>HỖ TRỢ ONLINE</b> <br><i style="font-size:15px;">Trực tuyến 24/7</i></p></th>
      </table>
    </form>
        <ul id="menufooter" style="font-size:13px;">
            <b>LIÊN HỆ VỚI CHÚNG TÔI</b>
        
            <li><i class="fa-solid fa-location-dot"></i> 146 Trần Nguyên Hãn</li>
            <li>&#9993 changnghia2307@gmail.com</li>
            <li>&#9742 Hotline: 19001081</li>
            <li> &#9719 Thứ 2 - Chủ nhật : 7h-22h</li>
        </ul>
        <ul id="menufooter2"style="font-size:13px;">
            <b>ĐIỀU KHOẢN</b>
            <li>Điều khoản sử dụng</li>
            <li>Quy tắc bảo mật</li>
            <li>Chính sách đặt hàng</li>
            
        </ul>
        <ul id="menufooter3"style="font-size:13px;">
        <b>ĐĂNG KÝ KHUYẾN MÃI</b>

    <form>
  <label  id="fname"><i>Nhập email bạn vào ô bên dưới để nhận các chương trình khuyến mãi của chúng tôi !</i></label><br>
  <input style="color: black;background-color: rgb(215, 215, 215);border:none;margin-top:10px ;height: 35px;width: 230px;margin-left:45px;" type="email"  placeholder="Nhập email..." required>

  <div class="gui">
  <input style="height: 35px;width:35px ;"  id="gui" type="submit" value="&#10148">
 </div>
 <p style="margin-top: -45px;margin-left:0px;"><li><i>Email:</i></li> </p>
    </form> 
    </ul>
    <p style="margin-left:680px;MARGIN-top:100px;">
    <a href="https://www.facebook.com/MTP.Fan"target="_blank"><i id="facebook" class="fa-brands fa-facebook" style="font-size:30px"></i></a>
    <a href="https://www.instagram.com/sontungmtp/?hl=vi"target="_blank"><i id="insta" class="fa-brands fa-instagram" style="font-size:30px;"></i></a>
    <a href="https://twitter.com/sontungmtp777" target="_blank"><i id="twit" class="fa-brands fa-twitter" style="font-size:30px;"></i></a>
 
     
    </p>
    
     </div>
 
<script>



document.getElementById("chin").onclick=function(){huy()};
  function huy(){
    document.getElementById("showchitiet").innerHTML = "";
  }
</script>
</body>
</html>
