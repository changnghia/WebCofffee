<?php 
    session_start(); 
    include("connection.php"); 

?>

<?php 
  
  if(isset($_GET['action']) && $_GET['action']=="add"){ 
        
      $id=intval($_GET['id']); 
      $return_url 	= base64_decode($_GET["return_url"]); //return url
        
      if(isset($_SESSION['cart'][$id])){ 
            
          $_SESSION['cart'][$id]['quantity']++; 
            
      }else{ 
            
          $sql_s="SELECT * FROM sanpham
              WHERE id={$id} "  ; 
          $query_s=$conn->query($sql_s); 
          if($query_s->num_rows!=0){ 
              $row_s=$query_s->fetch_array(); 
                
              $_SESSION['cart'][$row_s['id']]=array( 
                      "quantity" => 1, 
                      "gia" => $row_s['gia'] 
                      
                      
                  ); 
                
                
          }else{ 
                
              $message="This product id it's invalid!"; 
                
          } 
            
      } 
      header('Location:'.$return_url);
  } 

?> 

  <?php 
      if(isset($message)){ 
          echo "<h2>$message</h2>"; 
      } 
  ?> 
  