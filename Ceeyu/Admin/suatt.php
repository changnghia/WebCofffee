<?php

           $servername = "localhost";
           $username = "root";
           $password = "";
           $dbname = "Ceeyu";
      
$mysqli = new mysqli("$servername", "$username", "$password", "$dbname");
mysqli_set_charset($mysqli, 'UTF8');
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'UTF8');
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT *FROM donhang WHERE  id= ?";




$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $tenkh, $ngaydat,$sdt,$email, $diachi, $tong, $ghichu,$thanhtoan,$trangthai,$idkh);
$stmt->fetch();
$stmt->close();



echo "<form  method='POST' action='xulysuatt.php' id='cap' class='nhattt' >
Mã đơn hàng: <b>#$id</b>
<br>
<input type='hidden' value='$id' name='id'>
<input type='radio' value='Chờ xác nhận' name='huy'>
Chờ xác nhận
<br>
<input type='radio' value='Đang chuẩn bị hàng' name='huy'>
Đang chuẩn bị hàng
<br>
<input type='radio' value='Đang giao' name='huy'>
Đang giao
<br>
<input type='radio' value='Hoàn Thành' name='huy'>
Hoàn Thành
<br>
<input type='radio' value='Đã hủy' name='huy'>
Đã hủy

<br>

<input type='submit' id='btncapnhattt' name='capnhat' value='Cập nhật' >
<a id='chin'  onclick='huy()' >Hủy</a>



</form>";

?>
