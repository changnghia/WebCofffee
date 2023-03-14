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

$sql = "SELECT *FROM sanpham WHERE  id= ?";




$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $tensp, $loaisp, $gia, $mota, $hinhanh,$sluong);
$stmt->fetch();
$stmt->close();



echo "<form  method='POST' action='sua.php' id='cap' class='nhat' enctype='multipart/form-data'>
     


<img id='image'  style=' padding-left:30px;width:300px;height:400px; position:absolute;' src='http://localhost/CEEYU/image/$hinhanh'>
<div id='Filedanhsach'> <input type='file' name='image' id='imageFile' onchange='changeFile(this)' > </div>
<div id='nhanbiet'>
<p>Mã sản phẩm:  <span style=';margin-left:30px' > #$id</span></p>
<p>Tên sản phẩm:</p>
<p>Danh mục:</p>
<p>Giá:</p>
<p>Kho:</p>
<p>Mô tả:</p>
</div>
<div id=chitiet>
<input type='hidden' name='id' value='$id' >
<input type='text'placeholder='Tên sản phẩm' name='tensp' value='$tensp' required >

<br>

<select id='chonmuc'name='loaisp'> 
<option selected>$loaisp</option> 
";?><?php
$sql_s = "SELECT * FROM danhmuc where tendanhmuc!='$loaisp'";
$result = $conn->query($sql_s);
while($row = $result->fetch_assoc()) {
echo "<option>".$row['tendanhmuc']."</option> 


  ";
}?> <?php
echo "

</select>
 <br>
<br>
<input type='text'placeholder='Giá' name='gia' value='$gia' required >
<input type='text'placeholder='Số lượng trong kho' name='sluong' value='$sluong' required >

<textarea  style='margin-left:490px' type='text' rows='10'cols='30'placeholder='Mô tả' name='mota' >$mota</textarea>
<input type='submit' id='btncapnhat' name='capnhat' value='Cập nhật' >
<a id='chin'  onclick='huy()' >Hủy</a>

</div>

</form>";

?>
