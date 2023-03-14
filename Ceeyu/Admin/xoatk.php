<?php
  include("connection.php"); 
if(isset($_GET["action"]) && isset($_GET["action"])=="xoatk")
{
	$id=$_GET['id'];
	$return_url = base64_decode($_GET["return_url"]); //return url

    $sql = "DELETE FROM member WHERE id={$id}";
    
 // Thực hiện câu truy vấn
if (mysqli_query($conn, $sql)) {
    echo "Xóa thành công";
} else {
    echo "Xóa thất bại: " . mysqli_error($conn);
}
 
// ngắt kết nối
mysqli_close($conn);

 

	//redirect back to original page
	header('Location:'.$return_url);
}
else{
	echo "aray";
}
?>