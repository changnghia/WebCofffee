<?php 
    session_start(); 
    include("connection.php"); 

?>
<?php
if(isset($_GET["action"]) && isset($_GET["action"])=="tang")
{
	$id=$_GET['id'];
	$return_url = base64_decode($_GET["return_url"]); //return url
	$tongdele='0';  
	if(isset($_SESSION['cart'][$id])){	
			if($_SESSION['cart'][$id]==$_GET['id']);
			{
				$_SESSION['cart'][$id]['quantity']++;
			}
		
       
	}
	
	//redirect back to original page
	header('Location:'.$return_url);
}else{
	echo "aray";
}


?>