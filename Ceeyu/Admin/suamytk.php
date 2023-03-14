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

$sql=$_GET['q'];


$stmt = $mysqli->prepare($sql);

$stmt->execute();
$stmt->store_result();
$stmt->bind_result($row);
$stmt->fetch();
$stmt->close();



echo "<form  method='POST' action='xulysuamytk.php' id='cap' class='nhatmytk' enctype='multipart/form-data'>
   <input type='hidden' name='sql' value='$sql'>  
<p style='margin-left:50px'>$row &nbsp &nbsp &nbsp <span><i class='fa-solid fa-arrow-right-arrow-left'> </i></span>&nbsp &nbsp &nbsp &nbsp &nbsp  <input name='row' type='text' placeholder='Nhập...' required></p>
<input type='submit' id='btncapnhatmytk' name='capnhatmytk' value='Cập nhật' >
<a id='chin'  onclick='huy()' >Hủy</a>

</div>

</form>";

?>
