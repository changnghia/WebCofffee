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


$q=$_GET['q'];
$sql_s= "SELECT*FROM chitietdh where id=$q ";
$result=$mysqli->query($sql_s);
$stt=0;
echo "

<table id='nghiadh'>

<tr>
<th style='border:none;padding-bottom:20px;text-align:center' colspan='4'>Mã đơn hàng : #$q</th>
<th style='border:none;text-align:right;padding-bottom:20px'><a id='chin'  onclick='huy()' >x</a></th>

</tr>

<tr>
<th>STT</th>
<th>Tên sản phẩm</th>
<th>Danh mục </th>
<th>Giá </th>
<th>Số Lượng</th>
</tr>
";?>

<?php
if($result){
while($row= $result->fetch_assoc()){
$stt++;
echo " <tr>

<td>$stt</td>
<td>".$row['tensp']."</td>
<td>".$row['danhmuc']."</td>
<td>".$row['gia']."</td>
<td>x".$row['soluong']."</td>
</tr>
<tr>
<td colspan='5'><hr></td>
</tr>
";
}
}else{echo"lỗi";}
?>
<?php echo "</table>"; ?>