<?php 
session_start();
    include 'connection.php';
    $sql_id="SELECT id FROM donhang";
    $result_id=$conn->query($sql_id);
    while($row_id=$result_id->fetch_assoc()){
    $iddh=max($row_id)+1;
}
    if(isset($_POST['dathang'])){
        date_default_timezone_set("Asia/HO_CHI_MINH");
        $hoten=$_POST['hoten'];
        $ngaydat=date("d/m/Y H:i A");
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $diachi=$_POST['diachi'];
        $tong=$_POST['tong'];
        $ghichu=$_POST['ghichu'];
        $thanhtoan=$_POST['thanhtoan'];
        $trangthai=$_POST['trangthai'];
   
        $idkh=$_POST['idkh'];
    
        

      

      
        $sql="INSERT INTO donhang VALUE($iddh,N'$hoten',N'$ngaydat',N'$sdt',N'$email',N'$diachi',N'$tong',N'$ghichu',N'$thanhtoan',N'$trangthai',N'$idkh')";
  
      if($conn->query($sql)===TRUE){

        if(isset($_SESSION['cart'])){ 
            $sql="SELECT * FROM sanpham WHERE id IN ("; 
            foreach($_SESSION['cart'] as $id => $value) { 
                $sql.=$id.","; 
            } 
            $sql=substr($sql, 0, -1).") ORDER BY id asc"; 
            $query=$conn->query($sql); 
            while($row=$query->fetch_array()){ 
                $idsp=$row['id'];
                  
        $tensp=$row['tensp'];
        $loaisp=$row['loaisp'];
        $soluong=$_SESSION['cart'][$row['id']]['quantity'];
        $gia=$row['gia'];
              
                $sql_ct="INSERT INTO chitietdh(tensp,danhmuc,gia,soluong,id,idsp) VALUE(N'$tensp',N'$loaisp',N'$gia',$soluong,N'$iddh',N'$idsp')";
                if($conn->query($sql_ct)===TRUE){

                 $sql_sp="UPDATE `sanpham` SET sluong=sluong-'$soluong' where id='$idsp'";
                 $conn->query($sql_sp);
               

        } 
            }
            unset($_SESSION['cart']);
            header('Location:http://localhost/CEEYU/donhang.php');
        }
                  
    
        }
        else{
            echo"Đặt hàng không thành công";
        }


    }else{
        echo"ôi bạn ơiiiiiiiiiiiii!!!! ";
        echo"Đặt hàng đi bạn ơiiiiiiiiiiiiiiiiiiiiiiiii";
    }



?>