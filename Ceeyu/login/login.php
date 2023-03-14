
<!DOCTYPE html> 
<html> 
<head> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<link rel="stylesheet" href="css/style.css"/> 
<link rel="icon" href="http://localhost/CEEYU/image/Ceeyulogo-1.png">
<link rel="stylesheet" type="text/css" href="http://localhost/CEEYU/font-icon/css/all.css">
  <title>Login-DanCs2</title>
</head> 
<body> 
    <div style="text-align:center;margin-top:-85px;BACKGROUND:WHITE;margin-left:-10px; border: 0.2px solid rgb(231, 229, 229);height:50px;width:1476px;position:absolute;">
    <a href="http://localhost/CEEYU/index.php" style="text-decoration: none;color:gray;padding-top:50px;font-size:36px">DoanCs2</a>
    </div>

<form onsubmit="return ktra()" action="login.php" name="f1" class="dangnhap" method='POST'> 
    <h2 style="text-align:center">Đăng nhập</h2>
    <Br>

<input type='text' placeholder="Tên đăng nhập" name='username'/> 
<input type='password' placeholder="Mật khẩu" id="passjv" name='password' />  <span class="show-btn"><i class="fa-sharp fa-solid fa-eye"></i></span>
<input   type='submit' class="button" name="dangnhap" value='Đăng nhập' /> 
<p ><p style="margin-bottom:25px;margin-left:130px;margin-top:-8px;border:1px ;background:#cfcfcf;height:1.5px;width:130px"></p><p style="margin-bottom:25px;margin-left:320px;margin-top:-26.5px;border:1px ;background:#cfcfcf;height:1.5px;width:130px"></p><p style="margin-bottom:25px;margin-left:275px;margin-top:-35.5px;color:gray">hoặc</p></p>

<a id="btntaotk" href='http://localhost/CEEYU/register/register.php' title='Đăng ký'>Tạo tài khoản mới</a> 
<br><br><br><Br><div  style="text-align:Center" ><a id="quenmk"  href="#">Quên mật khẩu?</a></div>
<br>
<div style="text-align:center;color:red" id="kill"></div>

<?php require 'xuly.php';

?>
<?php 
if(isset($_SESSION['ten'])&&$_SESSION['id']==1){
  header('location:http://localhost/CEEYU/Admin/danhsach.php'); 
}else {
  if(isset($_SESSION['ten'])&&$_SESSION['id']>1){
    header('location:http://localhost/CEEYU/index.php'); 
  }
  else{
    echo "";
  }

}
?>
</form> 

<script>


  function ktra(){
    str=document.f1.username.value;
    p=document.f1.password.value;
  if (str == "") {
    document.getElementById("kill").innerHTML = "Vui lòng điền đầy đủ thông tin!!!";
     document.f1.username.style.borderColor="red";
    return false;
  }
  if (p == "") {
    document.getElementById("kill").innerHTML = "Mật khẩu không được để trống!!!";
    document.f1.password.style.borderColor="red";
    return false;
  }
  
}




     const passField = document.getElementById("passjv");
     const showBtn = document.querySelector("span i");
     showBtn.onclick = (()=>{
       if(passField.type === "password"){
         passField.type = "text";
         showBtn.classList.add("hide-btn");
       }else{
         passField.type = "password";
         showBtn.classList.remove("hide-btn");
       }
     });

    </script>
  
    
</body> 
</html>
