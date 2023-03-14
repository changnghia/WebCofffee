<?php

           $servername = "localhost";
           $username = "root";
           $password = "";
           $dbname = "Ceeyu";
      
$mysqli = new mysqli("$servername", "$username", "$password", "$dbname");
mysqli_set_charset($mysqli, 'UTF8');
if($mysqli->connect_error) {
  exit('Could not connect');
}


$sql = "SELECT id FROM danhmuc ";
$result = $mysqli->query($sql);



    // output dữ liệu trên trang
    while($row = $result->fetch_assoc()) {
      $stt= max($row)+1;
      }
echo "<form  method='POST' action='xulythemdm.php' id='cap' class='nhatdm'>

<div id='nhanbietdanhmuc'>
<p>Mã danh mục:<span style='position:fixed;margin-left:-300px;margin-top:-40px'><input type='text'placeholder='Mã danh mục' name='id' value='$stt'  required ></span></p>
<p>Tên danh mục:</p>
</div>

<div id=chitietdm>

<input type='text'placeholder='Tên danh mục' name='tendm'  required >
<input type='submit' id='btncapnhatdm' name='themdm' value='Cập nhật' >
<a id='chindm'  onclick='huy()' >Hủy</a>
</div>

</form>";

?>
