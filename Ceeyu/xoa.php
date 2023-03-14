<?php 
    session_start(); 
    include("connection.php"); 
 
  
?>
<?php
if(isset($_GET["action"]) && isset($_GET["action"])=="xoa")
{
	$id=$_GET['id'];
	$return_url = base64_decode($_GET["return_url"]); //return url
	$tongdele='0';  
	if(isset($_SESSION['cart'][$id])){	
			if($_SESSION['cart'][$id]==$_GET['id']);
			{
				$_SESSION['cart'][$id]['quantity']--;
			}
			if($_SESSION['cart'][$id]['quantity'] == 0) unset($_SESSION['cart'][$id]);
            if(count($_SESSION['cart']) == 0) unset($_SESSION['cart']);
	}
	
	//redirect back to original page
	header('Location:'.$return_url);
}
else{
	if(isset($_GET["xoahet"]) && isset($_GET["xoahet"])=="xoahet")
{
	if(isset($_SESSION['cart'])){	
			
				 unset($_SESSION['cart']);
	}
	
	//redirect back to original page
	header('Location:http://localhost/CEEYU/card.php');
}
}
?>
