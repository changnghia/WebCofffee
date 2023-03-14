<?php
require 'connect.php';
if (isset($_POST['btn-reg'])) {

    $ten = $_POST['ten'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $data = $_POST['data'];
    $address = $_POST['address'];
    $image_2= 'Ceeyulogo-1.png';
 //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
 if (!$username || !$password || !$email || !$ten || !$data || !$gender || !$phone || !$address)
 {
     echo "<Br><p style='color:red'>*Vui lòng nhập đầy đủ thông tin.</p>";
     exit;
 }
 $query = "SELECT * FROM member WHERE username='$username'";
 $result = mysqli_query($conn, $query) or die( mysqli_error($conn));
 
 //Kiểm tra tên đăng nhập này đã có người dùng chưa
 if ($result) {
    if(mysqli_num_rows($result) > 0){

    echo "<br><p style='color:Red'>*Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác.</p>";
    exit;   
}
}
$qry = "SELECT * FROM member WHERE phone='$phone'";
$result_s = mysqli_query($conn, $qry) or die( mysqli_error($conn));

if (mysqli_num_rows($result_s) > 0) {
    echo "<br><p style='color:Red'>*Số điện thoại đã tồn tại.</p> ";
    exit;
    }
$qry_s = "SELECT * FROM member WHERE email='$email'";
$result_ss = mysqli_query($conn, $qry_s) or die( mysqli_error($conn));

if (mysqli_num_rows($result_ss) > 0) {
    echo "<br><p style='color:Red'>*Email đã có người sử dụng. Vui lòng nhập lại.</p> ";
    exit;
    }

    if ($conn->query("INSERT INTO member (ten,avt,username,password,phone,email,gender,data,address) VALUES 
    (N'$ten','$image_2',N'$username',N'$password',N'$phone',N'$email',N'$gender',N'$data',N'$address')")) {
        echo "<br><p style='color:rgb(106, 226, 144);'>Đăng ký thành công. Bắt đầu đăng nhập?<a href='http://localhost/CEEYU/login/login.php'>Đăng Nhập</a>";

    } else {
        echo "<script>alert(' Bạn cần nhập đầy đủ thông tin trước khi đăng ký ');</script>";
        // echo "Bạn cần nhập đầy đủ thông tin trước khi đăng ký";
        // };

        // $conn->close();


        // if (
        //     !empty($fullname) && !empty($username) && !empty($password) && !empty($phone)
        //     && !empty($email) && !empty($gender) && !empty($data) && !empty($address)
        // ) {
        //     //insert du lieu
        //     echo "<pre>";
        //     print_r($_POST);
        //     $sql = "INSERT INTO `data_dangky` (`fullname`, `username`, `password`, `phone`,
        //     `email`, `gender`, `data`, `address`) VALUES('$fullname', '$username,'$password','$phone',
        //     '$email','$gender','$data','$address')";

        //     if ($conn->query($sql) === TRUE) {
        //         echo "Thêm dữ liệu thành công";
        //     } else {
        //         echo "Lỗi {$sql}" . $conn->error;
        //     }
        // } else {
        //     echo "Bạn cần nhập đầy đủ thông tin trước khi đăng ký";
        // }


    }
}
?>