<?php
    include 'connection.php';
    if(isset($_POST['capnhat'])){
        $tt=$_POST['huy'];
        $id=$_POST['id'];
        if($tt==="Đã hủy"){
            $sql="SELECT*FROM chitietdh where id='$id'";
            $result=$conn->query($sql);
            while($row=$result->fetch_assoc()){
                $sql_sp="UPDATE `sanpham` SET sluong=sluong+'".$row['soluong']."'  where id='".$row['idsp']."'";
                $result_sp=$conn->query($sql_sp);
            }
            if($conn->query("UPDATE donhang set trangthai='$tt' where id='$id'")){
            
                header('Location: http://localhost/CEEYU/Admin/danhsachdh.php');
            }
        }
        else{
        if($conn->query("UPDATE donhang set trangthai='$tt' where id='$id'")){
            
            header('Location: http://localhost/CEEYU/Admin/danhsachdh.php');
        }
    }
    }

?>