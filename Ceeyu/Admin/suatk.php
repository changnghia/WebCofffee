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

$sql = "SELECT *FROM member WHERE  id= ?";




$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id,$ten,$avt,$username,$password,$phone,$email,$gender,$data,$address);
$stmt->fetch();
$stmt->close();



echo "<form  method='POST' action='xulysuatk.php' id='cap' class='nhattk' enctype='multipart/form-data'>
     


<img id='image'  style='margin-left:80px;width:100px;height:100px; position:absolute;border: 1px solid gray;border-radius:250px;overflow:hidden;' src='http://localhost/CEEYU/image/$avt'>
<div id='Filedanhsachtk'> <input type='file' name='image' id='imageFile' onchange='changeFile(this)' > </div>
<div id='nhanbiettk'>
<p style='margin-top:-35px;margin-left:130px;position:absolute'>UID:#$id</p>
<p>Họ Tên:</p>
<p>Username:</p>
<p>Password:</p>
<p>Phone:</p>
<p>Email:</p>
<p>Giới tính:</p>
<p>Ngày sinh:</p>
<p>Địa chỉ:</p>
</div>
<div id=chitiettk>
<input type='hidden' name='id' value='$id' >
<input type='text'placeholder='Tên khách hàng' name='ten' value='$ten' required >

<input type='text'placeholder='Username' name='username' value='$username' readonly >
<input type='text'placeholder='Password' name='password' value='$password' minlength='7'maxlength='30' required >
<input type='tel'placeholder='Phone(10 chữ số)' name='phone1' value='$phone' minlength='10' maxlength='10' required >
<input type='email'placeholder='Email' name='email' value='$email' required >
<input type='text'placeholder='Giới tính' name='gender' value='$gender' required >
<input type='text'placeholder='Ngày sinh' name='data' value='$data' required >
<input type='text'placeholder='Địa chỉ' name='address' value='$address' required >

<input type='submit' id='btncapnhattk' name='capnhat' value='Cập nhật' >
<a id='chin'  onclick='huy()' >Hủy</a>

</div>

</form>";

?>
