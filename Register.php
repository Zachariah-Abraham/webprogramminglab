<?php

    require 'dbConn.php';

    $name = $_POST['name'];
    $email = $_POST['email']; 
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $country = $_POST['country'];
    $sql ="SELECT name FROM users WHERE name=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo '<h1>Cannot start db connection</h1>';
        exit();
    } else{
        mysqli_stmt_bind_param($stmt, "s", $name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck > 0){
            echo '<h1> Username already exists!</h1>';
            exit();
        } else{
            $sql = "INSERT INTO users (name, email, password, country, gender) VALUES ('".$name."','".$email."','".$password."','".$country."','".$gender."');";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                $smth = var_dump($stmt);
                echo '<h1>Cannot prepare statement!</h1>';
                exit();
            } else{
                mysqli_stmt_execute($stmt);
                header("Location: ../index.html");
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>