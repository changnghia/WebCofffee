<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"  href="css/apcss.css">
    <link rel="stylesheet" type="text/css" href="font-icon/css/all.css">
</head>
<body>
    
<div id="viewcheckthanhtoan">
    <h2 style="text-align:center;color:gray">Xác nhận đơn hàng</h2><br>
    <h2 style='position:fixed;border:none;margin-left:710px;margin-top:-110px;cursor:pointer;padding-bottom:20px'><a id='chin'  onclick='huy()' >x</a></h2>
    <hr style="width:500px"><h3>*THÔNG TIN NHẬN HÀNG</h3>
<?php 
include 'connection.php';
session_start();
if(isset($_SESSION['ten'])){
    echo"
    <form id='checkthanhtoan' method='POST' action='xulydathang.php'>
    Họ và tên:<br>
 <input name= 'hoten' class='inputcheck' type='text' value='".$_SESSION['ten']."'><br>

   <span>SĐT:</span><br>
    <input name='sdt' class='inputcheck'type='text' value='".$_SESSION['sdt']."'><br>

    Email:<br>
   <input name='email'class='inputcheck'type='email' value='".$_SESSION['email']."'><br>

   <span>Địa chỉ nhận hàng:</span><br>
   <input name='diachi'class='inputcheck'type='text' value='".$_SESSION['address']."'>
    <br>
    <span>Ghi chú:</span><br>
   <textarea name='ghichu' type='text' rows='10'cols='30'placeholder='*Ghi chú...'></textarea>
   <input name='trangthai' type='hidden' value='Chờ xác nhận'>
   <input type='hidden' name='idkh' value='".$_SESSION['id']."'>
   <br> <br> <br> <br> 

    ";
if(isset($_SESSION['cart'])){ 
        
    $sql="SELECT * FROM sanpham WHERE id IN ("; 
      
    foreach($_SESSION['cart'] as $id => $value) { 
        $sql.=$id.","; 
    } 
  $total='0';
  $tong='0';
    $sql=substr($sql, 0, -1).") ORDER BY id asc"; 
    $query=$conn->query($sql); 
    
    ?>  <h3>*ĐƠN HÀNG CỦA BẠN</h3>
    <table id="checksptt"><tr>
   
        <th style="width:250px">Tên sản phẩm</th>
        <th style="width:100px">Hình ảnh</th>
        <th style="width:110px">Danh mục</th>
        <th style="width:100px">Số lượng</th>
        <th style="width:100px">Giá</th>
       
        <tr><th colspan='5'><hr></th></tr>

    </tr> <?php
    
    while($row=$query->fetch_array()){ 

         $tong=$row['gia']* $_SESSION['cart'][$row['id']]['quantity'];
         $total=$total+$tong;
         echo "
         <tr>
        <input type='hidden' name='idsp' value='".$row['id']."'>
        <td> - ".$row['tensp']." </td> 
        <input name='tensp' type='hidden' value='".$row['tensp']."'>

        <td style='text-align:center'><img src='http://localhost/CEEYU/image/".$row['image']."'   width='45px' ></td>
        <td style='text-align:center'>  ".$row['loaisp']."</td> 
        <input name='loaisp' type='hidden' value='".$row['loaisp']."'>

        <td style='text-align:center'>x  ".$_SESSION['cart'][$row['id']]['quantity']."<br></td> 
        <input name='soluong' type='hidden' value='".$_SESSION['cart'][$row['id']]['quantity']."'>

        <td style='text-align:center'>  ".$row['gia']."</td> 
        <input name='gia' type='hidden' value='".$row['gia']."'>
   
        <tr><th colspan='5'><hr></th></tr>
         </tr>  
         ";
        }
        echo "<tr> <th colspan='3'style='text-align:right' >Tổng thanh toán:</th>
        <th colspan='2' style='text-align: right;color:red'> $total.000VNĐ<br></th>
        <input type='hidden' name='tong' value='$total.000'>
        <tr><th colspan='5'><hr></th></tr>
        </tr> 
        </table>
        <br> <br> 
   
        <h3>*PHƯƠNG THỨC THANH TOÁN</h3>
    
            <input type='radio' name='thanhtoan' value='Momo' id='momott' required>
            <label id='monosuke' for='momott'>Thanh Toán MoMo<image src='image/momo.png' width='25px' style='margin-left:420px'></label>
<br>
            <input type='radio' name='thanhtoan' value='Tiền mặt' id='tienmattt'>
            <label id='monosuke' for='tienmattt'>Tiền Mặt<i style='margin-left:480px;font-size:27px;color:Gray' class='fa-sharp fa-solid fa-money-check-dollar'></i></label>
<br>
            <input type='radio' name='thanhtoan' value='Chuyển Khoản' id='chuyenkhoantt'>
            <label id='monosuke' for='chuyenkhoantt'>Chuyển Khoản Ngân Hàng<image src='image/vietcom.png' width='85px' style='margin-left:310px'></label>

        <br> <br> <br> <br> 
        <hr style='width:500px'>
<div id='btndhbt'>
        <input   type='submit' class='buttondh' name='dathang' value='Hoàn Thành Đặt Hàng' /> 
 </div>
        </form>
        ";
    }
}else{
    echo"
    *Khách  Hoặc <a href='http://localhost/CEEYU/login/login.php'>Đăng nhập</a>
    <br><br><br>
    <form id='checkthanhtoan' method='POST' action='xulydathang.php'>
    Họ và tên:<br>
 <input name='hoten' class='inputcheck' type='text' placeholder='Nhập tên...' required><br>

   <span>SĐT:</span><br>";?>
    <input  name='sdt' class='inputcheck'type='text' placeholder='Nhập số điện thoại...' oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  maxlength='11'required><br>
<?php echo"
    Email:<br>
   <input name='email' class='inputcheck'type='email' placeholder='VD:nghia@gmail.com'required><br>

   <span>Địa chỉ nhận hàng:</span><br>
   <input name='diachi' class='inputcheck'type='text' placeholder='Nhập địa chỉ...'required>
    <br>
    <span>Ghi chú:</span><br>
   <textarea name='ghichu' type='text' rows='10'cols='30'placeholder='*Ghi chú...'></textarea>
   <input name='trangthai' type='hidden' value='Chờ xác nhận'>
   <input type='hidden' name='idkh' value=''>
   <br> <br> <br> <br> 

    ";
if(isset($_SESSION['cart'])){ 
        
    $sql="SELECT * FROM sanpham WHERE id IN ("; 
      
    foreach($_SESSION['cart'] as $id => $value) { 
        $sql.=$id.","; 
    } 
  $total='0';
  $tong='0';
    $sql=substr($sql, 0, -1).") ORDER BY id asc"; 
    $query=$conn->query($sql); 
    
    ?>  <h3>*ĐƠN HÀNG CỦA BẠN</h3>
    <table id="checksptt"><tr>
   
        <th style="width:250px">Tên sản phẩm</th>
        <th style="width:100px">Hình ảnh</th>
        <th style="width:110px">Danh mục</th>
        <th style="width:100px">Số lượng</th>
        <th style="width:100px">Giá</th>
       
        <tr><th colspan='5'><hr></th></tr>

    </tr> <?php
    
    while($row=$query->fetch_array()){ 

         $tong=$row['gia']* $_SESSION['cart'][$row['id']]['quantity'];
         $total=$total+$tong;
         echo "
         <tr>
        
        <td> - ".$row['tensp']." </td> 
        <input name='tensp' type='hidden' value='".$row['tensp']."'>

        <td style='text-align:center'><img src='http://localhost/CEEYU/image/".$row['image']."'   width='45px' ></td>
        <td style='text-align:center'>  ".$row['loaisp']."</td> 
        <input name='loaisp' type='hidden' value='".$row['loaisp']."'>

        <td style='text-align:center'>x  ".$_SESSION['cart'][$row['id']]['quantity']."<br></td> 
        <input name='soluong' type='hidden' value='".$_SESSION['cart'][$row['id']]['quantity']."'>

        <td style='text-align:center'>  ".$row['gia']."</td> 
        <input name='gia' type='hidden' value='".$row['gia']."'>


        <tr><th colspan='5'><hr></th></tr>
         </tr>  
         ";
        }
        echo "<tr> <th colspan='3'style='text-align:right' >Tổng thanh toán:</th>
        <th colspan='2' style='text-align: right;color:red'> $total.000VNĐ<br></th>
        <input type='hidden' name='tong' value='$total.000'>
        <tr><th colspan='5'><hr></th></tr>
        </tr> 
        </table>
        <br> <br> 
   
        <h3>*PHƯƠNG THỨC THANH TOÁN</h3>
    
            <input type='radio' name='thanhtoan' value='Momo' id='momott' required>
            <label id='monosuke' for='momott'>Thanh Toán MoMo<image src='image/momo.png' width='25px' style='margin-left:420px'></label>
<br>
            <input type='radio' name='thanhtoan' value='Tiền mặt' id='tienmattt'>
            <label id='monosuke' for='tienmattt'>Tiền Mặt<i style='margin-left:480px;font-size:27px;color:Gray' class='fa-sharp fa-solid fa-money-check-dollar'></i></label>
<br>
            <input type='radio' name='thanhtoan' value='Chuyển Khoản' id='chuyenkhoantt'>
            <label id='monosuke' for='chuyenkhoantt'>Chuyển Khoản Ngân Hàng<image src='image/vietcom.png' width='85px' style='margin-left:310px'></label>

        <br> <br> <br> <br> 
        <hr style='width:500px'>
<div id='btndhbt'>
        <input   type='submit' class='buttondh' name='dathang' value='Hoàn Thành Đặt Hàng' /> 
 </div>
        </form>
        ";
}
}

?>  

</div>
</body>
</html>