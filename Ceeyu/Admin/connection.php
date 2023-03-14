<?php  
             $servername = "localhost";
             $username = "root";
             $password = "";
             $dbname = "Ceeyu";
        
             // tạo connection
             $conn = new mysqli($servername, $username, $password, $dbname);
             mysqli_set_charset($conn, 'UTF8');
             // kiểm connection
             if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
             }  
             ?>