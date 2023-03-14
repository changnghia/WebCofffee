<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="icon" href="http://localhost/CEEYU/image/Ceeyulogo-1.png">
  <link rel="stylesheet" type="text/css" href="http://localhost/CEEYU/font-icon/css/all.css">
  <title>Register-DoanCs2</title>
</head>
<STYLE>
  body{
    background-color:  rgb(171, 208, 191);
  }
</style>


<body>
<div style="margin-left:-10px;margin-top:5px;BACKGROUND:WHITE; border: 0.2px solid rgb(231, 229, 229);height:50px;width:1476px;">
    <a href="http://localhost/CEEYU/index.php" style="   font-family: 'Times New Roman', Times, serif;margin-left:685px;  text-decoration: none;color:gray;font-size:36px">DoanCs2</a>
    </div>
  <div class="container">
    <div class="row">
      <div class="col-6 offset-md-3">


        <form name="f1"onsubmit="return matchpass()" id="form-reg" class="bg-light p-4 my-3" action="register.php" method="POST">
        <h2 style="text-align:center">Đăng ký</h2>
          <div class="form-group">
           
            <input placeholder="Họ và tên" type="text" name="ten" id="ten" class="form-control"  />
          </div>

          <div class="form-group">
          
            <input placeholder="Tên đăng nhập" type="text" name="username" id="username" class="form-control" />
          </div>

          <div class="form-group">
           
            <input placeholder="Mật khẩu" type="password" name="password" id="password"class="form-control" minlength="7"  /> <span class="show-btn"><i class="fa-sharp fa-solid fa-eye"></i></span>
          </div>

          <div class="form-group">
  
            <input placeholder="Nhập lại mật khẩu" type="password" name="password2" id="password2" onblur="matchpass()"class="form-control" minlength="7"/> <span id="show-btn2"><i class="fa-sharp fa-solid fa-eye"></i></span>
          </div>
          
          <div class="form-group">
          <input  type='text' placeholder='Số điện thoại'name="phone" id="phone" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength='11'required><br>

          </div>

          <div class="form-group">

            <input placeholder="Email" type="email" name="email" id="email" class="form-control"  />
          </div>

          <div id="gioitinh" class="form-group">
            <p style="margin-top:10px;position:absolute;" for="gender"> Giới tính </p>
            <div>
              <div id="nam"class="form-check form-check-inline">
                <input type="radio" name="gender" id="male" value="male" class="form-check-input" checked />
                <label for="male" class="form-check-label">Nam</label>
              </div>

              <div id="nu"class="form-check form-check-inline">
                <input type="radio" name="gender" id="female" value="male" class="form-check-input" />
                <label for="female" class="form-check-label">Nữ</label>
              </div>
            </div>
          </div>
              

            <div class="form-group" id="ngaysinh">
            <label for="data"> Ngày sinh </label>
            <input type="date" name="data" id="data" class="form-control"  />
          </div>

          <div class="form-group">
         
            <input placeholder="Địa chỉ"  type="text" name="address" id="address" class="form-control"  />
          </div>

          <input type="submit" value="Đăng Ký Ngay" id="btnreg" class="btn-primary btn btn-block mb-3" name="btn-reg" />
          
          
         <br><span style="margin-left:110px;color:gray"> Bạn đã có tài khoản?</span><a id="linkreg" href='http://localhost/CEEYU/login/login.php' title='Đăng nhập ngay'>Đăng nhập</a> 
        <?php require 'reg.php' ?>
        </form>
        <script>
          
     const passField = document.getElementById("password");
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
     
       
     const passField2 = document.getElementById("password2");
     const showBtn2 = document.getElementById("show-btn2");
     showBtn2.onclick = (()=>{
       if(passField2.type === "password"){
         passField2.type = "text";
         showBtn2.classList.add("hide-btn");
       }else{
         passField2.type = "password";
         showBtn2.classList.remove("hide-btn");
       }
     });

function matchpass(){  
var firstpassword=document.f1.password.value;  
var secondpassword=document.f1.password2.value;  
  
if(firstpassword==secondpassword){  
return true;  
}  
else{  
alert("Nhập lại mật khẩu không đúng!");  
return false;  
}  
} 
     </script>
      </div>
    </div>
</div>
</body>

</html>