<?php
    require 'dbConn.php';

    $name = $_POST['name'];
    $password = $_POST['password'];
    $sql = 'SELECT * FROM users WHERE(name=? AND password=?)';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo '<h1>Cannot start db connection</h1>';
        exit();
    } else{
        mysqli_stmt_bind_param($stmt, "ss", $name, $password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck > 0){
            header("Location: ../Home.html");
            exit();
        } else{
            echo "<h1>Username does not exist!</h1>";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>