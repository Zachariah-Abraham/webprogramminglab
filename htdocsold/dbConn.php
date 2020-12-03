<?php
 
    $servername ="localhost";
    $dbUser="root";
    $dbPassword="";
    $db="wpmpe";
 
    
    $conn = mysqli_connect($servername ,$dbUser, $dbPassword, $db);
    if(!$conn){
        die("Connection failed ".mysqli_connect_error());
    }
?>
