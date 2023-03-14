<?php 
    require 'connection.php';
    if(isset($_POST['xulythemtk'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];

        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_parts =explode('.',$_FILES['image']['name']);
        $file_ext=strtolower(end($file_parts));
        $expensions= array("jpeg","jpg","png");
        
      
    $ten = $_POST['ten'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $data = $_POST['data'];
    $address = $_POST['address'];

    $query = "SELECT * FROM member WHERE username='$username'";
 $result = mysqli_query($conn, $query) or die( mysqli_error($conn));
 if (!$username || !$password || !$email || !$ten || !$data || !$gender || !$phone || !$address)
 {
     echo "<p style='color:red'><i class='fa-solid fa-circle-exclamation'></i>Vui lòng nhập đầy đủ thông tin.</p>";
     exit;
 }
 //Kiểm tra tên đăng nhập này đã có người dùng chưa
 if ($result) {
    if(mysqli_num_rows($result) > 0){

    echo "<p style='color:Red'><i class='fa-solid fa-circle-exclamation'></i>Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác.</p>";
    exit;   
}
}
$qry = "SELECT * FROM member WHERE phone='$phone'";
$result_s = mysqli_query($conn, $qry) or die( mysqli_error($conn));

if (mysqli_num_rows($result_s) > 0) {
    echo "<p style='color:Red'><i class='fa-solid fa-circle-exclamation'></i>Số điện thoại đã tồn tại.</p> ";
    exit;
    }
$qry_s = "SELECT * FROM member WHERE email='$email'";
$result_ss = mysqli_query($conn, $qry_s) or die( mysqli_error($conn));

if (mysqli_num_rows($result_ss) > 0) {
    echo "<p style='color:Red'><i class='fa-solid fa-circle-exclamation'></i>Email đã có người sử dụng. Vui lòng nhập lại.</p> ";
    exit;
    }
    if (!$file_name )
    {
            $image_2= 'Ceeyulogo-1.png';
            if ($conn->query("INSERT INTO member (ten,avt,username,password,phone,email,gender,data,address) VALUES 
            (N'$ten','$image_2',N'$username',N'$password',N'$phone',N'$email',N'$gender',N'$data',N'$address')")) {
                echo "<p style='color:rgb(106, 226, 144);'>Thêm thành công.";
        
            } else {
                echo "<script>alert(' Bạn cần nhập đầy đủ thông tin trước khi đăng ký ');</script>";}
               
            

    } 

    if(in_array($file_ext,$expensions)=== false){
        $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
        }

        $image = $_FILES['image']['name'];
        $target = 'C:/xampp/htdocs/CEEYU/image/'.basename($image);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) { 
    if ($conn->query("INSERT INTO member (ten,avt,username,password,phone,email,gender,data,address) VALUES 
    (N'$ten','$image',N'$username',N'$password',N'$phone',N'$email',N'$gender',N'$data',N'$address')")) {
        echo "<p style='color:rgb(106, 226, 144);'>Thêm thành công.";

    } else {
        echo "<script>alert(' Bạn cần nhập đầy đủ thông tin trước khi đăng ký ');</script>";}
       
    }
            
         
   


}
 
    $conn->close();
?>
