<?php 
    require 'connection.php';
    if(isset($_POST['xulythem'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];

        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_parts =explode('.',$_FILES['image']['name']);
        $file_ext=strtolower(end($file_parts));
        $expensions= array("jpeg","jpg","png");
        
        $id=$_POST['id'];
        $tensp=$_POST['tensp'];
        $gia=$_POST['gia'];
        $loaisp=$_POST['loaisp'];
        $mota=$_POST['mota'];
        $sluong=$_POST['sluong'];
       
        if (!$file_name )
        {
            echo "<div id='khungthongbao'>
            <div id='thongbao'>
                <p><i class='fa-solid fa-circle-exclamation'></i> Vui lòng chọn ảnh.</p>
                <a href='http://localhost/CEEYU/Admin/themsp.php'>OK!</a>
            </div>
        </div>";
            exit;
        } 
        if(in_array($file_ext,$expensions)=== false){
            $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
            }
            
         
   

    $sql="SELECT * FROM sanpham where id='$id'";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
   if($result){
    if(mysqli_num_rows($result)>0)
    {
        echo "<div id='khungthongbao'>
        <div id='thongbao'>
            <p><i class='fa-solid fa-circle-exclamation'></i> Mã sản phẩm đã tồn tại.</p>
            <a href='http://localhost/CEEYU/Admin/themsp.php'>OK!</a>
        </div>
    </div>";
      
        exit;
    }
   }
   $image = $_FILES['image']['name'];
   $target = 'C:/xampp/htdocs/CEEYU/image/'.basename($image);
   if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

     if($conn->query("INSERT INTO sanpham(id,tensp,gia,loaisp,mota,image,sluong) VALUES($id,N'$tensp',$gia,N'$loaisp',N'$mota','$image','$sluong')"))
        {
            echo "<div id='khungthongbao'>
            <div id='thongbao'>
                <p style='color:rgb(106, 226, 144);'><i class='fa-solid fa-circle-check'></i> Thêm thành công!</p>
                <a href='http://localhost/CEEYU/Admin/themsp.php'>OK!</a>
            </div>
        </div>
            ";
        }
      
    }
}
 
    $conn->close();
?>
