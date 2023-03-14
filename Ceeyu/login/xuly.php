
<?php
//Khai báo sử dụng session
session_start();
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');


//Xử lý đăng nhập
if (isset($_POST['dangnhap']))
{
//Kết nối tới database
include('connect.php');
  
//Lấy dữ liệu nhập vào
$u=$_POST['username'];
$k=$_POST['password'];

//Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
//if (!$username || !$password) {
///echo "<br><br><p style='color:Red;text-align:center'>&times Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.";
//header('Location:http://localhost/CEEYU/login/login.php?action=tb');
//exit;
//}



// mã hóa pasword $password = md5($password);
  
//Kiểm tra tên đăng nhập có tồn tại không
$query = "SELECT * FROM member WHERE username='$u'";
$result = mysqli_query($conn, $query) or die( mysqli_error($conn));


if ($result) {
    if(mysqli_num_rows($result) > 0){
}
else{
    echo "<br><br><p style='color:Red;text-align:center'>&times Đăng nhập thất bại: Tài khoản hoặc mật khẩu bị sai</p>";
    exit();
 
}
}

//Lấy mật khẩu trong database ra
$row = mysqli_fetch_array($result);
//So sánh 2 mật khẩu có trùng khớp hay không
if ($k != $row['password']) {
    echo "<br><br><p style='color:Red;text-align:center'>&times Mật khẩu không đúng. Vui lòng nhập lại. ";
    unset($_POST);
    exit;

    }
    if($row['id']==1){

      echo " <p id='kl'>Đăng nhập thành công.<br><br> <a href='http://localhost/CEEYU/Admin/danhsach.php'>OK</a></p>";
      header('location:http://localhost/CEEYU/Admin/danhsach.php');
    }
    else{
        header('location:http://localhost/CEEYU/index.php');
}
//Lưu tên đăng nhập
$_SESSION['ten'] = $row['ten'];
$_SESSION['id'] = $row['id'];
$_SESSION['avt'] = $row['avt'];
$_SESSION['sdt'] = $row['phone'];
$_SESSION['address'] = $row['address'];
$_SESSION['email'] = $row['email'];

die();
$connect->close();
}else{

}
?>
  