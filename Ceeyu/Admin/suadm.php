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

$sql = "SELECT *FROM danhmuc WHERE  id= ?";




$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $tendanhmuc);
$stmt->fetch();
$stmt->close();



echo "<form  method='POST' action='xulysuadm.php' id='cap' class='nhatdm'>

<div id='nhanbietdanhmuc'>
<p>Mã danh mục:  <span style=';margin-left:30px' > #$id</span></p>
<p>Tên danh mục:</p>
</div>

<div id=chitietdm>
<input type='hidden' name='id' value='$id' >
<input type='text'placeholder='Tên danh mục' name='tendm' value='$tendanhmuc' required >
<input type='submit' id='btncapnhatdm' name='capnhatdm' value='Cập nhật' >
<a id='chindm'  onclick='huy()' >Hủy</a>
</div>

</form>";

?>
