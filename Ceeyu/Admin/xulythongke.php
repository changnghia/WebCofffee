<?php 
if(isset($_POST['submit'])){
    $return_url= base64_decode($_POST["return_url"]); //return url
    $thang=$_POST['thang'];
    $ngay=$_POST['ngay'];

    $repl=explode("-",$thang);
    session_start();
    if(!$ngay){
        $_SESSION['thang']="$repl[1]/$repl[0]";
        unset($_SESSION['ngay']);
        header('Location:'.$return_url);

    }else{
    $_SESSION['thang']="$repl[1]/$repl[0]";
        $_SESSION['ngay']=$ngay;
    header('Location:'.$return_url);
}

}
if(isset($_GET["action"]) && isset($_GET["action"])=="xoa"){
    $return_url= base64_decode($_GET["return_url"]); //return url
    session_start();
    unset($_SESSION['thang']);
    unset($_SESSION['ngay']);
    header('Location:'.$return_url);
}

?>