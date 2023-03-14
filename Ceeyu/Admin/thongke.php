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
    <title>Doanh Thu</title>
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
      <ul id='menuql'>  <li class='li'><a href='http://localhost/CEEYU/index.php '> Home</a></li></ul>
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
      <ul id='menuql'>    <li class='li'>Quản Lý Đơn Hàng</li>
      <div id='lksp'>
      <ul>
      <li> <a href='danhsachdh.php'>Danh Sách Đơn Hàng</a></li>
      <li> Thêm Đơn Hàng</li>
     </ul>
     </div>
      </ul>
      <ul id='menuql'>  <li class='li'style='  background-color: rgba(255, 255, 255, 0.53) ;
      border-radius: 25px;
      width:240px;
      margin-left:0px;
     '><a href=''>Doanh Thu</a></li></ul>
  
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
    <p style="border-left:1px solid gray;border-left-color:rgba(105, 185, 144, 0.53);height:20px;    box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.4);padding:10px;margin-left:10px;border-left-width:5px;  text-align:left">Doanh thu</p>
        <h3> Doanh Thu Của Web</h3>
       
        <hr width="1000px">
     

        </select>  </span>   
   
       <?php 
            include 'connection.php';
            $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

            echo "<form action='xulythongke.php'method='POST'>
            <span>Ngày</span> 
            <select name='ngay' id='ngayday'>
            <option value=''></option>
            ";
            
           for($i=1;$i<=31;$i++){ 
         echo " <option value='$i'>$i</option>";
        }
            echo "
          
          </select>
          <span>Tháng</span> 
            <input type='month'id='mon' name='thang'required>
            <input type='hidden' name='return_url' value='".$current_url."' />
          
                    <input type='submit' name='submit' value='Tìm'>
                    </form>
            ";

           date_default_timezone_set("Asia/HO_CHI_MINH");


           $ngaydat=date("d/m/Y");


           

           if(isset($_SESSION['ngay'])){
            echo "<br><p>Ngày ".$_SESSION['ngay']." Tháng ".$_SESSION['thang']."   &nbsp&nbsp<a href='xulythongke.php?action=xoa&return_url=".$current_url."'>X</a></p><br>";
$sql="SELECT * FROM donhang where ngaydat LIKE '%".$_SESSION['thang']."%' AND trangthai='Hoàn Thành'";
      
           $result=$conn->query($sql);
            $dem=0;
            $tongtoday=0;
        
           while($row=$result->fetch_assoc()){
            $dem++;
            $tongtoday=$tongtoday+$row['tong'];
           }echo"<div id='baoquat'>";
         
           echo "<div id='dhtoday'> 
           <i style='font-size:50px; color: rgb(75, 103, 197);'class='fa-solid fa-file-invoice'></i>
           <p>Tổng đơn hàng<br> ngày ".$_SESSION['ngay']." tháng ".$_SESSION['thang']."<br>($dem)</p>
           </div>";
           echo "<div id='dhtoday'> 
           <i style='font-size:50px;  color: rgb(84, 221, 84);'class='fa-solid fa-chart-line'></i>
           <p>Tổng lợi nhuận<br> ngày ".$_SESSION['ngay']." tháng ".$_SESSION['thang']." <br>$tongtoday.000 VNĐ</p>
           </div>";

           $sql_s="SELECT * FROM donhang where trangthai='Hoàn Thành'";
           $result_s=$conn->query($sql_s);
           $tong=0;
           while($row_s=$result_s->fetch_assoc()){
            $tong=$tong+$row_s['tong'];
           }
           echo "<div id='dhtoday'> 
           <i style='font-size:50px;color:yellow' class='fa-solid fa-coins'></i>
           <p>Tổng doanh thu Web <br> $tong.000 VNĐ</p>
           </div>";
       
           echo"</div>";
           }else{ if(isset($_SESSION['thang'])){
            echo "<br><p>Tháng ".$_SESSION['thang']."   &nbsp&nbsp<a href='xulythongke.php?action=xoa&return_url=".$current_url."'>X</a></p><br>";
$sql="SELECT * FROM donhang where ngaydat LIKE '%".$_SESSION['thang']."%' AND trangthai='Hoàn Thành'";
      
           $result=$conn->query($sql);
            $dem=0;
            $tongtoday=0;
        
           while($row=$result->fetch_assoc()){
            $dem++;
            $tongtoday=$tongtoday+$row['tong'];
           }echo"<div id='baoquat'>";
         
           echo "<div id='dhtoday'> 
           <i style='font-size:50px; color: rgb(75, 103, 197);'class='fa-solid fa-file-invoice'></i>
           <p>Tổng đơn hàng tháng ".$_SESSION['thang']."<br>($dem)</p>
           </div>";
           echo "<div id='dhtoday'> 
           <i style='font-size:50px;  color: rgb(84, 221, 84);'class='fa-solid fa-chart-line'></i>
           <p>Tổng lợi nhuận tháng ".$_SESSION['thang']." <br>$tongtoday.000 VNĐ</p>
           </div>";

           $sql_s="SELECT * FROM donhang where trangthai='Hoàn Thành'";
           $result_s=$conn->query($sql_s);
           $tong=0;
           while($row_s=$result_s->fetch_assoc()){
            $tong=$tong+$row_s['tong'];
           }
           echo "<div id='dhtoday'> 
           <i style='font-size:50px;color:yellow' class='fa-solid fa-coins'></i>
           <p>Tổng doanh thu Web <br> $tong.000 VNĐ</p>
           </div>";
       
           echo"</div>";
           }
           
           else{
            echo "<br><p>Hôm nay $ngaydat</p><br>";
           $sql="SELECT * FROM donhang where ngaydat LIKE '%$ngaydat%' AND trangthai='Hoàn Thành'";
      
           $result=$conn->query($sql);
            $dem=0;
            $tongtoday=0;
        
           while($row=$result->fetch_assoc()){
            $dem++;
            $tongtoday=$tongtoday+$row['tong'];
           }echo"<div id='baoquat'>";
         
           echo "<div id='dhtoday'> 
           <i style='font-size:50px; color: rgb(75, 103, 197);'class='fa-solid fa-file-invoice'></i>
           <p>Tổng đơn hàng hôm nay <br>($dem)</p>
           </div>";
           echo "<div id='dhtoday'> 
           <i style='font-size:50px;  color: rgb(84, 221, 84);'class='fa-solid fa-chart-line'></i>
           <p>Tổng lợi nhuận hôm nay <br>$tongtoday.000 VNĐ</p>
           </div>";

           $sql_s="SELECT * FROM donhang where trangthai='Hoàn Thành'";
           $result_s=$conn->query($sql_s);
           $tong=0;
           while($row_s=$result_s->fetch_assoc()){
            $tong=$tong+$row_s['tong'];
           }
           echo "<div id='dhtoday'> 
           <i style='font-size:50px;color:yellow' class='fa-solid fa-coins'></i>
           <p>Tổng doanh thu Web <br> $tong.000 VNĐ</p>
           </div>";
       
           echo"</div>";
        }}
        $sql="SELECT*FROM sanpham";
        $result=$conn->query($sql);
        $tongkho=0;
        while($row=$result->fetch_assoc()){
         $tongkho=$tongkho+ $row['sluong'];
        }
        echo"<br><br><br><div id='baoquat'>";
         
        echo "<div id='dhtoday'> 
       
        <i style='font-size:45px; color: rgb(240, 45, 45);' class='fa-sharp fa-solid fa-warehouse'></i>
        <p>Tổng kho ($tongkho)</p>
        
        </div>";
        echo "<div style='overflow: scroll;' id='dhtoday'> 
        <i style='font-size:30px; color: rgb(232, 170, 55);float:left;margin-left:20px;margin-top:-20px;' class='fa-solid fa-box-open'></i>
        <p style='margin-top:-15px;color:rgb(232, 170, 55);font-size:16px;margin-left:30px'>Sản phẩm tồn kho</p>
      ";
      $sql_dm="SELECT*FROM danhmuc";
      $result_dm=$conn->query($sql_dm);
      
      while($row_dm=$result_dm->fetch_assoc()){
        $tongsldm=0;
        $sql_sldm="SELECT*FROM sanpham where loaisp='".$row_dm['tendanhmuc']."'";
        $result_sldm=$conn->query($sql_sldm);
        while($row_sldm=$result_sldm->fetch_assoc()){
          $tongsldm=$tongsldm+$row_sldm['sluong'];
         
        }
        echo "<p style='text-align:left;margin-left:20px'>".$row_dm['tendanhmuc']." ($tongsldm)</p>";
      }
        echo "</div>";
        echo"</div>";
    
       ?>
    </div>
    <?php } else{
      echo"  <p style='color:red;font-size:100px;float:left;position:fixed'><i class='fa-solid fa-circle-exclamation'></i> TÉO TEO TEO TÈO TEO TÈO TÈO TEO TEO TÉOOOO!!!</p>";
    }?>
</body>
</html>